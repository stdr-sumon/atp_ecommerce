<?php

namespace App\Http\Controllers;

use App\UserMain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserMainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catagory = DB::table('catagory')
            ->get();

        return view('user.index')
            ->with('catagory', $catagory);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserMain  $userMain
     * @return \Illuminate\Http\Response
     */
    public function show(UserMain $userMain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserMain  $userMain
     * @return \Illuminate\Http\Response
     */
    public function edit(UserMain $userMain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserMain  $userMain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserMain $userMain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserMain  $userMain
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserMain $userMain)
    {
        //
    }
}
