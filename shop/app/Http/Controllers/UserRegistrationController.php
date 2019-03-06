<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationRequest;
use App\Login;
use App\UserRegistration;
use Illuminate\Http\Request;

class UserRegistrationController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('registration.user.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(UserRegistrationRequest $request) {
		$lg = new login();
		$lg->type = "CUSTOMER";
		$lg->password = $request->password;
		$lg->username = $request->username;
		$lg->statusid = 1;

		$lg->save();

		$user = new userRegistration();
		$user->name = $request->name;
		$user->email = $request->email;
		$user->address = $request->address;
		$user->phone = $request->phone;
		$user->loginid = $lg->id;
		date_default_timezone_set('Asia/Dhaka');
		$user->join_date = date('Y-m-d H:i:s');

		$user->save();
		return view('login.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\UserRegistration  $userRegistration
	 * @return \Illuminate\Http\Response
	 */
	public function show(UserRegistration $userRegistration) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\UserRegistration  $userRegistration
	 * @return \Illuminate\Http\Response
	 */
	public function edit(UserRegistration $userRegistration) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\UserRegistration  $userRegistration
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, UserRegistration $userRegistration) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\UserRegistration  $userRegistration
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(UserRegistration $userRegistration) {
		//
	}
}
