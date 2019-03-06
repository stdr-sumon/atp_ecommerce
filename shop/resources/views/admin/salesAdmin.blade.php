@extends('admin.index')

@section('content')

<h4>Sales</h4>
<table class="table  table-hover">
    <thead>
      <tr>
        <th>Invoice ID</th>
        <th>Employee ID</th>
        <th>Customer ID</th>
        <th>Customer name</th>
        <th>Total Price</th>
        <th>Date Time</th>
        <th>Status</th>

      </tr>
    </thead>
    <tbody>
     @foreach($invoice as $inv)
      <tr style="background-color: lightcyan">
      <td >{{$inv->id}} </td>
      <td >{{$inv->empid}} </td>
      <td >{{$inv->customerid}} </td>
			<td >{{$inv->customername}} </td>
			<td >{{$inv->price}} </td>
      <td >{{$inv->datetime}} </td>
      @if($inv->status=='ON_PROCESS')
			<td style="color:brown" >{{$inv->status}} </td>
      @endif
       @if($inv->status=='DELIVERED')
      <td style="color:green" >{{$inv->status}} </td>
      @endif
      @if($inv->status =='CANCELLED')
      <td style="color:red" >{{$inv->status}} </td>
      @endif

	    </tr>

      @endforeach
    </tbody>
  </table>
@endsection