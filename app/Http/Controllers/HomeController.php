<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     // $this->middleware('guest')->except('logout');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jadwals = \DB::table('bookings')
        ->leftJoin('sesi_lists','bookings.sesi_mulai','=','sesi_lists.id')
        ->select('tanggal_main','sesi_mulai','sesi_selesai','nama_pemesan','nama_sesi')        
        ->get();
        
        $saldo = \DB::table('member_details')
        ->select('saldo')
        ->where('user_id','=',Auth::id())
        ->get();

        return view('home',compact('jadwals', 'saldo'));
    }
}
