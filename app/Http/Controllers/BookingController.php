<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:booking-list|booking-create|booking-edit|booking-delete', ['only' => ['index','show']]);
        //  $this->middleware('permission:booking-create', ['only' => ['create','store']]);
         $this->middleware('permission:booking-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:booking-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::latest()->paginate(5);
        return view('bookingDetail.index',compact('bookings'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sesiMulaiBooked = Booking::orderBy('sesi_mulai')->select('sesi_mulai','tanggal_main')->get();
        $sesiSelesaiBooked = Booking::orderBy('sesi_selesai')->get();

        $sesi = \DB::table('sesi_lists')->select('id','nama_sesi')->get();

        $optLapangan = \DB::table('lapangans')->select('id','nama_lapangan','harga')->where('status','=','Ready')->get();

        return view('bookingDetail.create', compact('sesi','optLapangan', 'sesiMulaiBooked', 'sesiSelesaiBooked'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jml_bayar = $request['jml_bayar'];
        request()->validate([
            'tanggal_main' => 'required',
            'sesi_mulai' => 'required',
            'sesi_selesai' => 'required',  
            'nohp' => 'required',  
            'nama_pemesan' => 'required',  
            'id_pemesan' => 'required',  
            'id_lapangan' => 'required',  
            'status' => 'required',                               
        ]);
        
        if ((Booking::where('sesi_mulai', '=', $request['sesi_mulai'])->exists()) && (Booking::where('sesi_selesai', '=', $request['sesi_selesai'])->exists()) && (Booking::where('tanggal_main', '=', $request['tanggal_main'])->exists())) {            
            return redirect()->back()->with('success', 'Sesi has been used by other user');
        } else{
            Booking::create($request->all());            
            $book_id = Booking::orderBy('id', 'desc')->first();
            return view('payment.create')->with('success','Booking successfull, please finish the payment')->with('booking_id', $book_id['id'])->with('jml_bayar', $jml_bayar);
        }                    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        // return view('bookingDetail.show',compact('booking'));
        
        return view('bookingDetail.show', [
            'booking' => $booking
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        return view('bookingDetail.edit',compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        request()->validate([
            'tanggal_main' => 'required',
            'sesi_mulai' => 'required',
            'sesi_selesai' => 'required',  
            'nohp' => 'required',  
            'nama_pemesan' => 'required',  
            'id_pemesan' => 'required',  
            'id_lapangan' => 'required',  
            'status' => 'required',  
        ]);            

        $booking->update($request->all());
    
        return redirect()->route('booking.index')
                        ->with('success','Booking updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
