<?php
namespace App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('login.index');
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
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Login  $login
	 * @return \Illuminate\Http\Response
	 */
	public function show(Login $login) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Login  $login
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Login $login) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Login  $login
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Login $login) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Login  $login
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Login $login) {
		//
	}
	public function verify(Request $request) {
		//$un = $request->input('username');

		// $user = login::where('username', $request->username)
		// 	->where('password', $request->password)
		// 	->first();
		$user = DB::table('login')
			->where('username', $request->username)
			->where('password', $request->password)
			->first();

		if ($user != null) {
			$request->session()->put('loggedUser', $user);
			$request->session()->flash('message', 'success');

			if ($user->type == 'ADMIN' || $user->type == 'SALESMAN') {
				return redirect()->route('admin.index');
			}
			if ($user->type == 'CUSTOMER') {
				return redirect()->route('products.index');
			}
			return redirect()->route('login.index');
		} else {
			$request->session()->flash('username', $request->username);
			$request->session()->flash('message', 'Invalid username or password');
			/*return view('login.index')
				    			->with('username', $un)
			*/

			return redirect()->route('admin.index');
		}
	}
}
