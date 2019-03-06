@extends('admin.index')

@section('content')

<h4>Order List</h4>
@if($type == "ALL")
<a href="{{route('report.orderListAll')}}" class="btn btn-success">Show Group By</a>
@endif
@if($type != "ALL")
<a href="{{route('report.orderList')}}" class="btn btn-success">Show All</a>
@endif
<table class="table  table-hover">
    <thead>
      <tr>
        <th>Product ID</th>
        @if($type != "ALL")
        <th>Total Sold time</th>
        @endif

        <th>Quantity</th>

      </tr>
    </thead>
    <tbody>
     @foreach($orderlist as $inv)
      <tr style="background-color: lightcyan">
        <td >{{$inv->productid}} </td>
        @if($type != "ALL")
        <td >{{$inv->totalbuy}} </td>
        @endif

      <td >{{$inv->quantity}} </td>


	    </tr>

      @endforeach
    </tbody>
  </table>
@endsection