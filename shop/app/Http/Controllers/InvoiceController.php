<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		$catagory = DB::table('catagory')
			->get();
		$invoice = DB::table('invoice')
			->where('customerid', $request->session()->get('loggedUser')->id)
			->get();
		return view('user.transections')
			->with('invoice', $invoice)
			->with('catagory', $catagory);
	}

	public function invoiceSalesAdmin(Request $request) {
		$catagory = DB::table('catagory')
			->get();
		$invoice = DB::table('invoiceall')
			->get();
		return view('admin.salesAdmin')
			->with('invoice', $invoice)
			->with('catagory', $catagory);
	}
	public function invoiceSales(Request $request) {
		$catagory = DB::table('catagory')
			->get();
		$invoice = DB::table('invoiceall')
			->where('status', "ON_PROCESS")
			->get();
		return view('admin.sales')
			->with('invoice', $invoice)
			->with('catagory', $catagory);
	}
	public function invoiceDeliver($id, Request $request) {
		$catagory = DB::table('catagory')
			->get();
		$inv = Invoice::find($id);
		$inv->empid = $request->session()->get('loggedUser')->id;
		$inv->status = "DELIVERED";
		$inv->save();

		// $invoice = DB::table('invoice')
		// 	->where('status', "ON_PROCESS")
		// 	->get();
		return redirect()->route('invoice.sales');
	}
	public function invoiceCancel($id, Request $request) {
		$catagory = DB::table('catagory')
			->get();
		$inv = Invoice::find($id);
		$inv->empid = $request->session()->get('loggedUser')->id;
		$inv->status = "CANCELLED";
		$inv->save();

		$invoice = DB::table('invoice')
			->where('status', "ON_PROCESS")
			->get();
		return redirect()->route('invoice.sales');
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
	 * @param  \App\Invoice  $invoice
	 * @return \Illuminate\Http\Response
	 */
	public function show(Invoice $invoice) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Invoice  $invoice
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Invoice $invoice) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Invoice  $invoice
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Invoice $invoice) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Invoice  $invoice
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Invoice $invoice) {
		//
	}
}
