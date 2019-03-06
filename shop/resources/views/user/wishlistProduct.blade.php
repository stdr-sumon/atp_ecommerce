@extends('user.index')

@section('content')

@php($totalquantity = 0)
@php($totalprice = 0)
<h3>Wishlist Items</h3>
<table class="table  table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Status</th>
        <th>Options</th>
      </tr>
    </thead>
    <tbody>
     @foreach($products as $prd)


      <tr style="background-color: lightcyan">

			<td >{{$prd->id}} </td>
			<td >{{$prd->name}} </td>
      <td >{{$prd->selling_price}} </td>
      @if($prd->status=='INSTOCK')
			<td style="color:green" >{{$prd->status}} </td>
      <td ><a href="{{route('userCart.addToCartWish', [$prd->id])}}">AddToCart</a></td>
      @endif
       @if($prd->status!='INSTOCK')
      <td style="color:brown" >{{$prd->status}} </td>
      <td style="color:brown">Not Available</td>
      @endif




	    </tr>
      @endforeach
    </tbody>
  </table>
@endsection