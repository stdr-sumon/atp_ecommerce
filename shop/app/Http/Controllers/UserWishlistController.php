<?php

namespace App\Http\Controllers;

use App\UserWishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserWishlistController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}
	public function wishlistShow(Request $request) {
		$catagory = DB::table('catagory')
			->get();
		$products = DB::table('wishlistproduct')
			->where('customerid', $request->session()->get('loggedUser')->id)
			->get();

		return view('user.wishlistProduct')
			->with('catagory', $catagory)
			->with('products', $products);
	}
	public function addToWish($id, Request $request) {
		$p = new userWishlist();
		$p->customerid = $request->session()->get('loggedUser')->id;
		$p->productid = $id;

		date_default_timezone_set('Asia/Dhaka');

		$p->datetime = date('Y-m-d H:i:s');

		$p->save();
		// $cart = [
		// 	$id => $request->session()->get('loggedUser')->id,
		// ];
		// if ($request->session()->has('cart')) {
		// 	foreach ($request->session()->get('cart') as $c) {
		// 		# code...
		// 		array_push($cart, $c);
		// 	}
		// }

		//$request->session()->put('cart', $cart);
		return redirect()->route('products.index');

	}

	public function addToWishAll($id, Request $request) {

		$p = new userWishlist();
		$p->customerid = $request->session()->get('loggedUser')->id;
		$p->productid = $id;

		date_default_timezone_set('Asia/Dhaka');

		$p->datetime = date('Y-m-d H:i:s');

		$p->save();
		// $cart = [
		// 	$id => $request->session()->get('loggedUser')->id,
		// ];
		// if ($request->session()->has('cart')) {
		// 	foreach ($request->session()->get('cart') as $c) {
		// 		# code...
		// 		array_push($cart, $c);
		// 	}
		// }

		return redirect()->route('products.showallsearch', [0]);
	}
	public function addToWishDetail($id, Request $request) {

		$p = new userWishlist();
		$p->customerid = $request->session()->get('loggedUser')->id;
		$p->productid = $id;

		date_default_timezone_set('Asia/Dhaka');

		$p->datetime = date('Y-m-d H:i:s');

		$p->save();

		return redirect()->route('userProduct.details', [$id]);
	}

	public function deleteFromWish($id, Request $request) {

		DB::table('wishlist')
			->where('productid', $id)
			->where('customerid', $request->session()->get('loggedUser')->id)
			->delete();
		return redirect()->route('products.index');

	}

	public function deleteFromWishAll($id, Request $request) {

		DB::table('wishlist')
			->where('productid', $id)
			->where('customerid', $request->session()->get('loggedUser')->id)
			->delete();
		return redirect()->route('products.showallsearch', [0]);

	}
	public function deleteFromWishAllDetail($id, Request $request) {

		DB::table('wishlist')
			->where('productid', $id)
			->where('customerid', $request->session()->get('loggedUser')->id)
			->delete();
		return redirect()->route('userProduct.details', [$id]);

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
	 * @param  \App\UserWishlist  $userWishlist
	 * @return \Illuminate\Http\Response
	 */
	public function show(UserWishlist $userWishlist) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\UserWishlist  $userWishlist
	 * @return \Illuminate\Http\Response
	 */
	public function edit(UserWishlist $userWishlist) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\UserWishlist  $userWishlist
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, UserWishlist $userWishlist) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\UserWishlist  $userWishlist
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(UserWishlist $userWishlist) {
		//
	}
}
