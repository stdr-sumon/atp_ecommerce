@extends('user.index')

@section('content')


<div class="row">
	<div  class="container">
	  <div class="card" style="width:450px">
	    <!-- <img class="card-img-top" src="images/product.jpg" alt="Card image" width="400" height="300"> -->
	    <div class="card-body">
	      <h4 class="card-title" >Product: <span style="color:blue">{{$product->name}}</span> </h4>


	      <p class="card-text"> <h6>Product ID: PR_{{$product->id}} </h6> </p>
			<p class="card-text"> <h6>Category: {{$product->catagory_name}} >> {{$product->subcatagory_name}} </h6> </p>
	      <p class="card-text"> <h6>Description: {{$product->description}} </h6>

	      </p>

	      <h5>PRICE: <span style="color:green">{{$product->selling_price}}</span> </h5>
	      <h5>STATUS:
	      @if($product->status=='INSTOCK')
	      <span style="color:green">{{$product->status}}</span>
	      @endif
	      @if($product->status!='INSTOCK')
	     <span style="color:red">{{$product->status}}</span>
	      @endif
	      </h5>

	      @php ($wshid = -1)
	      @if(session()->has('loggedUser'))

		      @forelse($wishlist as $wsh)
		      @if($product->id == $wsh->productid)
			      @php ($wshid = 1)
			      @break
		      @endif
		      @if($product->id != $wsh->productid)
		      	@php ($wshid = 0)

		      @endif


	      @empty
	      <a href="{{route('userWishlist.addToWishDetail', [$product->id])}}" class="btn btn-success">Add Wishlist</a>
	      @endforelse
	      @if($wshid==1)
	      <a href="{{route('userWishlist.deleteFromWishAllDetail', [$product->id])}}" class="btn btn-danger">Added To Wishlist</a>
	      @endif
	      @if($wshid==0)
	      <a href="{{route('userWishlist.addToWishDetail', [$product->id])}}" class="btn btn-success">Add Wishlist</a>
	      @endif
	      <div>
	      	@if($product->status=='INSTOCK')

	      	<form method="post">
				{{csrf_field()}}
		      	<h3></h3>
		      	<input type="hidden" name="product_id" value="{{$product->id}}">
		      	<input type="number" class="form-control" name="quantity" placeholder="Quantity" style="width:110px">
		      	<h3></h3>
		      	<input type="submit" class="btn btn-warning" style="width:110px" value="AddToCart">
	      </form>
	      @endif
	      </div>
	      @endif

	    </div>
	  </div>
	</div>
		<div  class="col-xl-1">
	</div>
	<br>
</div>
@endsection