<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\OrderList;
use App\Product;
use App\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserCartController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}
	public function cartShowAll(Request $request) {
		$catagory = DB::table('catagory')
			->get();
		$products = DB::table('cartproduct')
			->where('customerid', $request->session()->get('loggedUser')->id)
			->get();

		return view('user.cartProduct')
			->with('catagory', $catagory)
			->with('products', $products);
	}
	public function checkOut(Request $request) {
		$catagory = DB::table('catagory')
			->get();
		$products = DB::table('cartproduct')
			->where('customerid', $request->session()->get('loggedUser')->id)
			->get();

		$user = DB::table('customer')
			->where('loginid', $request->session()->get('loggedUser')->id)
			->first();

		$quantity = DB::table('cart')
			->where('customerid', $request->session()->get('loggedUser')->id)
			->sum('quantity');
		$price = DB::table('cartproduct')
			->where('customerid', $request->session()->get('loggedUser')->id)
			->sum('price');

		return view('user.cartCheckout')
			->with('user', $user)
			->with('quantity', $quantity)
			->with('price', $price)
			->with('catagory', $catagory)
			->with('products', $products);
	}

	public function addToCart($id, Request $request) {
		$status = DB::table('product_all')
			->where('id', $id)
			->first();
		if ($status->status != 'INSTOCK') {
			return;
		}
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
					->where('customerid', $request->session()->get('loggedUser')->id)
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
		return redirect()->route('products.index');
	}

	public function addToCartBack($id, Request $request) {
		$status = DB::table('product_all')
			->where('id', $id)
			->first();
		if ($status->status != 'INSTOCK') {
			return;
		}
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
					->where('customerid', $request->session()->get('loggedUser')->id)
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
		return redirect()->route('products.showallsearch', [0]);
	}
	public function addToCartWish($id, Request $request) {
		$status = DB::table('product_all')
			->where('id', $id)
			->first();
		if ($status->status != 'INSTOCK') {
			return;
		}
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
					->where('customerid', $request->session()->get('loggedUser')->id)
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
		return redirect()->route('wishlist.show');
	}

	public function addToCartDetails($id, Request $request) {
		$status = DB::table('product_all')
			->where('id', $id)
			->first();
		if ($status->status != 'INSTOCK') {
			return;
		}
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
				$q = $c->quantity + $qnty;
			}
		}
		$p = new userCart();
		$p->customerid = $request->session()->get('loggedUser')->id;
		$p->productid = $id;
		$p->quantity = $q;

		date_default_timezone_set('Asia/Dhaka');

		$p->datetime = date('Y-m-d H:i:s');

		$p->save();
		return redirect()->route('products.index');
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function checkDone(Request $request) {
		$cartPrice = DB::table('cartproduct')
			->where('customerid', $request->session()->get('loggedUser')->id)
			->sum('price');
		$cartlist = DB::table('cartproduct')
			->where('customerid', $request->session()->get('loggedUser')->id)
			->get();
		$cart = DB::table('cart')
			->where('customerid', $request->session()->get('loggedUser')->id)
			->count();
		if ($cart == 0) {
			echo "empty";
			return;
		}
		foreach ($cartlist as $p) {
			if ($p->quantity < $p->cartquantity) {
				echo "not available";
				return;
			}
		}

		$invoice = new invoice();
		$invoice->empid = 0;
		$invoice->customerid = $request->session()->get('loggedUser')->id;
		$invoice->price = $cartPrice;
		$invoice->status = "ON_PROCESS";

		date_default_timezone_set('Asia/Dhaka');

		$invoice->datetime = date('Y-m-d H:i:s');

		$invoice->save();
		foreach ($cartlist as $cList) {
			$orderlist = new orderlist();
			$orderlist->productid = $cList->id;
			$orderlist->quantity = $cList->cartquantity;
			$orderlist->price = $cList->selling_price;
			$orderlist->total_price = $cList->price;
			$orderlist->invoiceid = $invoice->id;
			$orderlist->save();

			$product = product::find($cList->id);
			$product->quantity = $product->quantity - $cList->cartquantity;
			$product->save();

		}
		DB::table('cart')
			->where('customerid', $request->session()->get('loggedUser')->id)
			->delete();
		return redirect()->route('products.index');
	}

	public function deleteFromCart($id, Request $request) {
		DB::table('cart')
			->where('customerid', $request->session()->get('loggedUser')->id)
			->where('productid', $id)
			->delete();
		return redirect()->route('cart.showAll');
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
	 * @param  \App\UserCart  $userCart
	 * @return \Illuminate\Http\Response
	 */
	public function show(UserCart $userCart) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\UserCart  $userCart
	 * @return \Illuminate\Http\Response
	 */
	public function edit(UserCart $userCart) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\UserCart  $userCart
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, UserCart $userCart) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\UserCart  $userCart
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(UserCart $userCart) {
		//
	}
}
