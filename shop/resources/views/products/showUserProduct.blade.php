@extends('user.index')

@section('content')


<div class="row">
	@foreach($products as $prd)
	<div  class="col-xl-3">
	  <div class="card" style="width:450px">
	    <!-- <img class="card-img-top" src="images/product.jpg" alt="Card image" width="400" height="300"> -->
	    <div class="card-body">
	      <h4 class="card-title" >Product: <span style="color:blue">{{$prd->name}}</span> </h4>
	      <p class="card-text"> <h6>Product ID: PR_{{$prd->id}} </h6> </p>
			<p class="card-text"> <h6>Category: {{$prd->catagory_name}} >> {{$prd->subcatagory_name}} </h6> </p>
	      <p class="card-text"> <h6>Description: {{$prd->description}} </h6>

	      </p>

	      <h5>PRICE: <span style="color:green">{{$prd->selling_price}}</span> </h5>
	      <h5>STATUS:
	      @if($prd->status=='INSTOCK')
	      <span style="color:green">{{$prd->status}}</span>
	      @endif
	      @if($prd->status!='INSTOCK')
	     <span style="color:red">{{$prd->status}}</span>
	      @endif
	      </h5>
	      <a href="{{route('userProduct.details',[$prd->id])}}" class="btn btn-info">Details</a>
	      @php ($wshid = -1)
	      @if(session()->has('loggedUser'))

		      @forelse($wishlist as $wsh)
		      @if($prd->id == $wsh->productid)
			      @php ($wshid = 1)
			      @break
		      @endif
		      @if($prd->id != $wsh->productid)
		      	@php ($wshid = 0)

		      @endif
	      @empty
	      <a href="{{route('userWishlist.addToWish', [$prd->id])}}" class="btn btn-success">Add Wishlist</a>
	      @endforelse
	      @if($wshid==1)
	      <a href="{{route('userWishlist.deleteFromWish', [$prd->id])}}" class="btn btn-danger">Added To Wishlist</a>
	      @endif
	      @if($wshid==0)
	      <a href="{{route('userWishlist.addToWish', [$prd->id])}}" class="btn btn-success">Add Wishlist</a>
	      @endif
	      @endif
	      @if($prd->status=='INSTOCK')
	      <a href="{{route('userCart.add',[$prd->id])}}" class="btn btn-warning">AddToCart</a>
	      @endif
	    </div>
	  </div>
	</div>
		<div  class="col-xl-1">
	</div>
	<br>
	@endforeach
</div>
@endsection