@extends('admin.index')

@section('content')

<h4>Pending Sales</h4>
<table class="table  table-hover">
    <thead>
      <tr>
        <th>Invoice ID</th>
        <th>Customer ID</th>
        <th>Customer NAME</th>
        <th>Total Price</th>
        <th>Date Time</th>
        <th>Status</th>
        <th>Option</th>

      </tr>
    </thead>
    <tbody>
     @foreach($invoice as $inv)
      <tr style="background-color: lightcyan">
      <td >{{$inv->id}} </td>
      <td >{{$inv->customerid}} </td>
			<td >{{$inv->customername}} </td>
			<td >{{$inv->price}} </td>
      <td >{{$inv->datetime}} </td>
      @if($inv->status== "ON_PROCESS")
			<td style="color:red" >{{$inv->status}} </td>
      @endif
       @if($inv->status!='ON_PROCESS')
      <td style="color:green" >{{$inv->status}} </td>
      @endif
      <td ><a style="color:green" href="{{route('invoice.deliver', [$inv->id])}}">Deliver</a> | <a style="color:brown" href="{{route('invoice.cancel', [$inv->id])}}">Cancel</a>

      </td>

	    </tr>

      @endforeach
    </tbody>
  </table>
@endsection