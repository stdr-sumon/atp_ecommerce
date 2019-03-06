@extends('admin.index')

@section('content')

<h4>Buying Price</h4>
@if($type == "ALL")
<a href="{{route('report.buyHistoryAll')}}" class="btn btn-success">Show Group By</a>
@endif
@if($type != "ALL")
<a href="{{route('report.buyHistory')}}" class="btn btn-success">Show All</a>
@endif
<table class="table  table-hover">
    <thead>
      <tr>
        <th>Product id</th>
        @if($type != "ALL")
        <th>Total Broght</th>
        @endif
        <th>Product name</th>
        <th>Buying_price</th>
        <th>Selling_price</th>
        <th>Available quantity</th>
        <th>Last buying_price</th>
        <th>Last buying_quantity</th>
        <th>Date Time</th>
        <th>Status</th>

      </tr>
    </thead>
    <tbody>
     @foreach($buyHistory as $inv)
      <tr style="background-color: lightcyan">
      <td >{{$inv->id}} </td>
      @if($type != "ALL")
        <td >{{$inv->totalbuy}} </td>
        @endif
      <td >{{$inv->name}} </td>
      <td >{{$inv->buying_price}} </td>
      <td >{{$inv->selling_price}} </td>
			<td >{{$inv->quantity}} </td>
			<td >{{$inv->brought_price}} </td>
      <td >{{$inv->quantitybuy}} </td>
      <td >{{$inv->date_time}} </td>
      @if($inv->status=='INSTOCK')
			<td style="color:green" >{{$inv->status}} </td>
      @endif
       @if($inv->status!='INSTOCK')
      <td style="color:red" >{{$inv->status}} </td>
      @endif

	    </tr>

      @endforeach
    </tbody>
  </table>
@endsection