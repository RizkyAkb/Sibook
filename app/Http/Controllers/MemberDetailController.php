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
        return view('memberDetail.index');
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
            'masa_berlaku' => 'required',
            'saldo' => 'required',
            'hari_main' => 'required',
            'sesi_mulai' => 'required',
            'sesi_selesai' => 'required',
            'status' => 'required',                        
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
}
