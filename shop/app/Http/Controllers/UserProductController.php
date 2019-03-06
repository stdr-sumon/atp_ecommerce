<?php

namespace App\Http\Controllers;

use App\userCart;
use App\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserProductController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		$catagory = DB::table('catagory')
			->get();
		$catNames = DB::table('cat_sub')
			->get();
		$products = DB::table('product_all')
			->get();
		$wishlist = [];
		if ($request->session()->has('loggedUser')) {
			$wishlist = DB::table('wishlist')
				->where('customerid', $request->session()->get('loggedUser')->id)
				->get();
		}

		$cat = 0;
		$srch = "";
		$val = [$cat, $srch];

		return view('products.showUserProduct')
			->with('catagory', $catagory)
			->with('products', $products)
			->with('srch', $srch)
			->with('categ', $cat)
			->with('wishlist', $wishlist);
	}
	public function showAll(Request $request) {
		$catagory = DB::table('catagory')
			->get();
		$catNames = DB::table('cat_sub')
			->get();
		$products = DB::table('product_all')
			->get();
		if ($request->session()->has('loggedUser')) {
			$wishlist = DB::table('wishlist')
				->where('customerid', $request->session()->get('loggedUser')->id)
				->get();
		}

		$cat = 0;
		$srch = "";
		$val = [$cat, $srch];

		return view('products.showUserProductAll')
			->with('catagory', $catagory)
			->with('products', $products)
			->with('srch', $srch)
			->with('categ', $cat)
			->with('wishlist', $wishlist);
	}
	public function details($id, Request $request) {
		$catagory = DB::table('catagory')
			->get();
		$products = DB::table('product_all')
			->where('id', $id)
			->first();
			$wishlist = [];
		if ($request->session()->has('loggedUser')) {
			$wishlist = DB::table('wishlist')
				->where('customerid', $request->session()->get('loggedUser')->id)
				->get();
		}

		return view('products.userProductDetails')
			->with('catagory', $catagory)
			->with('product', $products)
			->with('wishlist', $wishlist);
	}

	public function showAllSearch(Request $request, $categ_id) {
		$catagory = DB::table('catagory')
			->get();
		$srch = "";
		$categ = $categ_id;
		$subcat = 0;
		$wishlist = [];
		if ($categ_id == 0) {
			$products = DB::table('product_all')
				->where('name', 'like', "%$request->search%")
				->get();
		} else {
			$products = DB::table('product_all')
				->where('catagoryid', $categ_id)
				->where('name', 'like', "%$request->search%")
				->get();

		}

		$subCategories = DB::table('subcategory')
			->where('catagoryid', $categ_id)
			->get();

		if ($request->session()->has('loggedUser')) {
			$wishlist = DB::table('wishlist')
				->where('customerid', $request->session()->get('loggedUser')->id)
				->get();
		}

		return view('products.showUserProductAll')
			->with('catagory', $catagory)
			->with('products', $products)
			->with('srch', $srch)
			->with('categ', $categ)
			->with('wishlist', $wishlist)
			->with('subcat', $subcat)
			->with('subcategory', $subCategories);
	}
	public function showAllSearchAll(Request $request, $categ_id) {
		$catagory = DB::table('catagory')
			->get();

		$srch = $request->search;
		$categ = $request->category_id;
		$subcat = $request->subcategory;
		if ($request->category_id == 0) {
			$products = DB::table('product_all')
				->where('name', 'like', "%$request->search%")
				->get();
		} else {
			if ($request->subcategory == 0) {
				$products = DB::table('product_all')
					->where('catagoryid', $request->category_id)
					->where('name', 'like', "%$request->search%")
					->get();
			} else {
				$products = DB::table('product_all')
					->where('catagoryid', $request->category_id)
					->where('subcatagoryid', $request->subcategory)
					->where('name', 'like', "%$request->search%")
					->get();

			}

		}

		$subCategories = DB::table('subcategory')
			->where('catagoryid', $request->category_id)
			->get();

		if ($request->session()->has('loggedUser')) {
			$wishlist = DB::table('wishlist')
				->where('customerid', $request->session()->get('loggedUser')->id)
				->get();
		}

		return view('products.showUserProductAll')
			->with('catagory', $catagory)
			->with('products', $products)
			->with('srch', $srch)
			->with('categ', $categ)
			->with('wishlist', $wishlist)
			->with('subcat', $subcat)
			->with('subcategory', $subCategories);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}
	public function addToCart($id, Request $request) {
		$q = $request->quantity;
		if ($request->quantity == null) {
			$q = 1;
		}
		$cartlist = DB::table('cart')
			->where('customerid', $request->session()->get('loggedUser')->id)
			->get();

		foreach ($cartlist as $c) {
			if ($id == $c->productid) {
				DB::table('cart')
					->where('productid', $id)
					->delete();
				$q = $c->quantity + $q;
			}
		}
		$p = new userCart();
		$p->customerid = $request->session()->get('loggedUser')->id;
		$p->productid = $id;
		$p->quantity = $q;

		date_default_timezone_set('Asia/Dhaka');

		$p->datetime = date('Y-m-d H:i:s');

		$p->save();
		return redirect()->route('userProduct.details', $request->product_id);
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
	 * @param  \App\UserProduct  $userProduct
	 * @return \Illuminate\Http\Response
	 */
	public function show(UserProduct $userProduct) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\UserProduct  $userProduct
	 * @return \Illuminate\Http\Response
	 */
	public function edit(UserProduct $userProduct) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\UserProduct  $userProduct
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, UserProduct $userProduct) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\UserProduct  $userProduct
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(UserProduct $userProduct) {
		//
	}

}
