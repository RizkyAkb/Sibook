<?php

namespace App\Http\Controllers;

use App\Models\BookingDetail;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingDetailController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:bookingDetail-list|bookingDetail-create|bookingDetail-edit|bookingDetail-delete', ['only' => ['index','show']]);
         $this->middleware('permission:bookingDetail-create', ['only' => ['create','store']]);
         $this->middleware('permission:bookingDetail-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:bookingDetail-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bookingDetail.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookingDetail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'booking_id' => 'required',
            'jenis_pemmbayaran' => 'required',
            'total_bayar' => 'required',                                 
        ]);
    
        BookingDetail::create($request->all());
    
        return redirect()->route('bookingDetail.index')
                        ->with('success','Schedule created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookingDetail  $bookingDetail
     * @return \Illuminate\Http\Response
     */
    public function show(BookingDetail $bookingDetail)
    {
        return view('bookingDetail.show',compact('bookingDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookingDetail  $bookingDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingDetail $bookingDetail)
    {
        return view('bookingDetail.edit',compact('bookingDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookingDetail  $bookingDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookingDetail $bookingDetail)
    {
        request()->validate([
            'booking_id' => 'required',
            'jenis_pemmbayaran' => 'required',
            'total_bayar' => 'required',  
        ]);
    
        $bookingDetail->update($request->all());
    
        return redirect()->route('bookingDetail.index')
                        ->with('success','Member detail updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookingDetail  $bookingDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingDetail $bookingDetail)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bayar_guest(Request $request) 
    {
        request()->validate([            
            'jenis_pembayaran' => 'required',
            'total_bayar' => 'required',     
            'booking_id' => 'required',                            
        ]);
    
        BookingDetail::create($request->all());
    
        Booking::where('id',$request['booking_id'])->update(['status' => 'Booked/Sudah Bayar']);


        return redirect('/')->with('success','Schedule created successfully.');
    }
}
