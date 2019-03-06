<?php

namespace App\Http\Controllers;

use App\AdminRegistration;
use App\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminRegistrationController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$catagory = DB::table('catagory')
			->get();
		return view('registration.admin.index')
			->with('catagory', $catagory);
	}
	public function employeeShow(Request $request) {
		$catagory = DB::table('catagory')
			->get();
		// $buyHistory = DB::table('buyingpricehistoryall')
		//           ->select('*', DB::raw('count(id) as totalbuy'))
		//           ->groupBy('id')
		//           ->get();
		$employee = DB::table('employeeall')
			->get();
		return view('admin.employee')
			->with('catagory', $catagory)
			->with('employee', $employee);
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
	public function store(Request $request) {
		$lg = new login();
		$lg->type = $request->type;
		$lg->username = $request->username;
		$lg->password = $request->password;
		$lg->statusid = 4;

		$lg->save();

		$admin = new adminRegistration();
		$admin->name = $request->name;
		$admin->email = $request->email;
		$admin->address = $request->address;
		$admin->phone = $request->phone;
		$admin->loginid = $lg->id;
		date_default_timezone_set('Asia/Dhaka');
		$admin->birth_date = $request->dob;
		$admin->join_date = date('Y-m-d H:i:s');

		$admin->joined_by_id = $request->session()->get('loggedUser')->id; //have to be changed

		$admin->last_modified = date('Y-m-d H:i:s');
		$admin->save();
		return view('login.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\AdminRegistration  $adminRegistration
	 * @return \Illuminate\Http\Response
	 */
	public function show(AdminRegistration $adminRegistration) {
		$catagory = DB::table('catagory')
			->get();

		$products = DB::table('product_all')
			->get();

		return view('admin.product_show')
			->with('catagory', $catagory)
			->with('products', $products);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\AdminRegistration  $adminRegistration
	 * @return \Illuminate\Http\Response
	 */
	public function edit(AdminRegistration $adminRegistration) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\AdminRegistration  $adminRegistration
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, AdminRegistration $adminRegistration) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\AdminRegistration  $adminRegistration
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(AdminRegistration $adminRegistration) {
		//
	}
}
