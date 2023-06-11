<?php

namespace App\Http\Controllers;

use App\Models\MemberDetail;
use Illuminate\Http\Request;
use App\Models\User;

class MemberDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('memberDetail.create');
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
            'user_id' => 'required',
            'masa_berlaku',
            'saldo',
            // 'hari_main',
            // 'sesi_mulai',
            // 'sesi_selesai',
            'status',
        ]);
    
        MemberDetail::create($request->all());
    
        return redirect()->route('memberDetail.index')
                        ->with('success','Schedule created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberDetail  $memberDetail
     * @return \Illuminate\Http\Response
     */
    public function show(MemberDetail $memberDetail)
    {
        // $memberDetail = auth()->id();
        return view('memberDetail.show',compact('memberDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberDetail  $memberDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberDetail $memberDetail)
    {
        return view('memberDetail.edit',compact('memberDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemberDetail  $memberDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberDetail $memberDetail)
    {
        request()->validate([
            'user_id' => 'required',
            'masa_berlaku' => 'required',
            'saldo' => 'required',
            'hari_main' => 'required',
            'sesi_mulai' => 'required',
            'sesi_selesai' => 'required',
            'status' => 'required',  
        ]);
    
        $memberDetail->update($request->all());
    
        return redirect()->route('memberDetail.index')
                        ->with('success','Member detail updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberDetail  $memberDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberDetail $memberDetail)
    {
        //
    }

    // Redirect to top up form
    public function topup(MemberDetail $memberDetail)
    {
        return view('memberDetail.topup');
    }

    // Isi saldo member berdasarkan id login
    public function update_topup(Request $request, MemberDetail $memberDetail)
    {
        MemberDetail::where('user_id',auth()->user()->id)->update(['saldo' => $request['saldo']]);
        // $memberDetail->update(['saldo' => $request->saldo]);

        // dd($memberDetail);
        return view('memberDetail.show')
                        ->with('success','Top up success.');
    }
}
