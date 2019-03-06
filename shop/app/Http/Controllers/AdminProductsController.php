<?php

namespace App\Http\Controllers;

use App\Admin_Products;
use App\Http\Requests\AdminProductRequest;
use App\Http\Requests\AdminProductUpdateRequest;
use App\PriceHistory;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProductsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

	}
	public function addProducts() {
		$catagory = DB::table('catagory')
			->get();

		$catNames = DB::table('cat_sub')
			->get();

		return view('products.add')
			->with('catagory', $catagory)
			->with('catNames', $catNames);
		// return view ('login.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$catagory = DB::table('catagory')
			->get();

		$catNames = DB::table('cat_sub')
			->get();

		return view('products.add')
			->with('catagory', $catagory)
			->with('catNames', $catNames);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(AdminProductRequest $request) {

		$product = new product();
		$product->name = $request->name;
		$product->buying_price = $request->buying_price;
		$product->selling_price = $request->selling_price;
		$product->quantity = $request->quantity;
		$product->statusid = 4;
		$product->description = $request->description;
		$product->subcatagoryid = $request->category;

		$product->save();
		$request->session()->flash('message', 'successfully save');

		$p = new priceHistory();
		$p->productid = $product->id;
		$p->buying_price = $request->buying_price;
		$p->quantity = $request->quantity;
		$p->empid = 1;

		date_default_timezone_set('Asia/Dhaka');

		$p->date_time = date('Y-m-d H:i:s');

		$p->save();
		// $p = updateBuyingPrice($product->id,$request->buying_price,$request->quantity);
		return redirect()->route('adminProduct.addProducts');

	}

	public function updateBuyingPrice($pid, $buying_price, $quantity) {

		$product = new priceHistory();
		$product->productid = $pid;
		$product->buying_price = $buying_price;
		$product->quantity = $quantity;
		$product->empid = 1;

		date_default_timezone_set('Asia/Dhaka');

		$product->date_time = date('Y-m-d H:i:s');

		$product->save();

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Admin_Products  $admin_Products
	 * @return \Illuminate\Http\Response
	 */
	public function show_all(Request $request) {
		$catagory = DB::table('catagory')
			->get();
		$catNames = DB::table('cat_sub')
			->get();
		$products = DB::table('product_all')
			->get();
		$cat = 0;
		$srch = "";
		$val = [$cat, $srch];

		return view('admin.product_show')
			->with('catagory', $catagory)
			->with('products', $products)
			->with('srch', $srch)
			->with('categ', $cat);
	}

	public function categoryShow(Request $request) {
		$catagory = DB::table('catagory')
			->get();
		$cat = $request->category;
		// echo "$request->search";
		// echo "$request->category";
		// return;
		// if($request->search== null)
		// {
		// 	$srch = "";
		// }
		$srch = $request->search;
		$val = [$cat, $srch];
		if ($request->category == 0) {
			$products = DB::table('product_all')
				->where('name', 'like', "%$request->search%")
				->get();
		} else {
			$products = DB::table('product_all')
				->where('catagoryid', $request->category)
				->where('name', 'like', "%$request->search%")
				->get();
		}

		return view('admin.product_show')
			->with('catagory', $catagory)
			->with('products', $products)
			->with('srch', $srch)
			->with('categ', $cat);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Admin_Products  $admin_Products
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Admin_Products $admin_Products) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Admin_Products  $admin_Products
	 * @return \Illuminate\Http\Response
	 */

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Admin_Products  $admin_Products
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Admin_Products $admin_Products) {
		//
	}

	public function details($id) {
		$catagory = DB::table('catagory')
			->get();

		$products = DB::table('product_all')
			->where('id', $id)
			->first();

		return view('products.details')
			->with('catagory', $catagory)
			->with('products', $products);
	}

	public function productEdit($id) {
		$catagory = DB::table('catagory')
			->get();

		$products = DB::table('product_all')
			->where('id', $id)
			->first();
		$catNames = DB::table('cat_sub')
			->get();
		return view('products.edit')
			->with('catagory', $catagory)
			->with('products', $products)
			->with('catNames', $catNames);
	}
	public function update(AdminProductRequest $request) {

		$id = $request->id;
		$product = Product::find($id);
		$product->name = $request->name;
		$product->buying_price = $request->buying_price;
		$product->selling_price = $request->selling_price;
		$product->quantity = $request->quantity;
		$product->description = $request->description;
		$product->subcatagoryid = $request->category;

		$product->save();
		$request->session()->flash('message', 'successfully save');
		return redirect()->route('adminProduct.addProducts');

	}

	public function productUpdate($id) {
		$catagory = DB::table('catagory')
			->get();

		$products = DB::table('product_all')
			->where('id', $id)
			->first();
		//$catNames = DB::table('cat_sub')
		//->get();
		return view('products.update')
			->with('catagory', $catagory)
			->with('products', $products);
		//->with('catNames', $catNames);
	}
	//@post
	public function product_Update(AdminProductUpdateRequest $request) {

		$id = $request->id;
		$product = Product::find($id);
		$product->buying_price = $request->buying_price;
		$product->selling_price = $request->selling_price;
		$product->quantity = $product->quantity + $request->quantity;

		$product->save();
		$request->session()->flash('message', 'successfully save');
		return redirect()->route('adminProduct.addProducts');

	}

}
