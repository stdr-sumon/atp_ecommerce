<?php

namespace App\Http\Controllers;

use App\OrderList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderListController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function orderList(Request $request) {
		$catagory = DB::table('catagory')
			->get();
		// $buyHistory = DB::table('buyingpricehistoryall')
		//           ->select('*', DB::raw('count(id) as totalbuy'))
		//           ->groupBy('id')
		//           ->get();
		$orderlist = DB::table('invoiceorder')
			->get();
		return view('admin.orderlist')
			->with('catagory', $catagory)
			->with('orderlist', $orderlist)
			->with('type', "ALL");
	}
	public function orderListTotal(Request $request) {
		$catagory = DB::table('catagory')
			->get();
		$orderlist = DB::table('invoiceorder')
			->select('*', DB::raw('count(productid) as totalbuy'))
			->groupBy('productid')
			->get();
		// $buyHistory = DB::table('buyingpricehistoryall')
		//  ->get();

		return view('admin.orderlist')
			->with('catagory', $catagory)
			->with('orderlist', $orderlist)
			->with('type', "Group");
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
	 * @param  \App\OrderList  $orderList
	 * @return \Illuminate\Http\Response
	 */
	public function show(OrderList $orderList) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\OrderList  $orderList
	 * @return \Illuminate\Http\Response
	 */
	public function edit(OrderList $orderList) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\OrderList  $orderList
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, OrderList $orderList) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\OrderList  $orderList
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(OrderList $orderList) {
		//
	}
}
