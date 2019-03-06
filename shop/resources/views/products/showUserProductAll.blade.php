@extends('user.index')

@section('content')

<div class="row">
<div class="col-xl-2">
  <h2>Categories</h2>

  <div class="list-group">
  	@if($categ == 0)

  	<a href="{{route('products.showallsearch', [0])}}" class="list-group-item list-group-item-danger" value = "0">All -></a>
  	@endif
  	@if($categ != 0)

  	<a href="{{route('products.showallsearch', [0])}}" class="list-group-item list-group-item-success" value = "0">All</a>
  	@endif
  	@php ($val = 0)
	@foreach($catagory as $cat)
			@if($val == 0)
				@if($categ == $cat->id)

			    <a href="{{route('products.showallsearch', [$cat->id])}}" class="list-group-item list-group-item-danger" value = "{{$cat->id}}">{{$cat->name}} -></a>
			    @endif

			    @if($categ != $cat->id)


			    <a href="{{route('products.showallsearch', [$cat->id])}}" class="list-group-item list-group-item-success" value = "{{$cat->id}}">{{$cat->name}}</a>
			    @endif
    	@php ($val = 1)
    @continue
    @endif
	@if($val == 1)
				@if($categ == $cat->id)


			    <a href="{{route('products.showallsearch', [$cat->id])}}" class="list-group-item list-group-item-danger" value = "{{$cat->id}}">{{$cat->name}} -></a>
			    @endif
			    @if($categ != $cat->id)
    			<a href="{{route('products.showallsearch', [$cat->id])}}" class="list-group-item list-group-item-success" value = value = "{{$cat->id}}">{{$cat->name}}</a>@php ($val = 0)
    @endif
    @endif

    @endforeach
  </div>
</div>
<div class="col-xl-10">

<div class="row">
	<div  class="col-xl-10">
	<form method="post">
	    {{csrf_field()}}

	    <div class="row">
	    	<input type="hidden" name="category_id" value = "{{$categ}}">
				<div  class="col-xl-4">
		    <label for="category">Sub-Category:</label>
		      <select class="form-control" name="subcategory">
		      @if($subcat == 0)
		        <option value=0>All</option>
		        @endif

		        @foreach($subcategory as $cat)
		        @if($subcat == $cat->id)
		        <option value="{{$cat->id}}">{{$cat->name}}</option>
		        @endif
		        @endforeach
		        @if($subcat != 0)
		        <option value=0>All</option>
		        @endif

		        @foreach($subcategory as $cat)
		        @if($subcat != $cat->id)
		        <option value="{{$cat->id}}">{{$cat->name}}</option>
		        @endif
		        @endforeach


		      </select>

	      </div>





		<br>
		<div  class="col-xl-1">
			<h2></h2>
			<br>
			<button type="submit" class="btn btn-primary">Submit</button>
			</div>
			<div  class="col-xl-1">
			</div>
	<div>
	   <!-- <form method="post"> -->
	    <!-- {{csrf_field()}} -->
	    <div  class="col-xl-4">
	    <div style="width:400px">
	    <label for="category">Search</label><br>
	      <input type="text"  name="search" placeholder="Search" value = "{{$srch}}">
	      <button type="submit" class="btn btn-primary">search</button>
	      </div>
	  </div>

	  </div>
	</div>

  </form>
</div>
</div>



	<div class="row">



	@foreach($products as $prd)
	<div  class="col-xl-3">
	  <div class="card" style="width:350px">
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
	      <a href="{{route('userWishlist.addToWishAll', [$prd->id])}}" class="btn btn-success">Add Wishlist</a>
	      @endforelse
	      @if($wshid==1)
	      <a href="{{route('userWishlist.deleteFromWishAll', [$prd->id])}}" class="btn btn-danger">In Wishlist</a>
	      @endif
	      @if($wshid==0)
	      <a href="{{route('userWishlist.addToWishAll', [$prd->id])}}" class="btn btn-success">Add Wishlist</a>
	      @endif
	      @endif
	      @if($prd->status=='INSTOCK')
	      <a href="{{route('userCart.addToCartBack',[$prd->id])}}" class="btn btn-warning">AddToCart</a>
	      @endif
	    </div>
	  </div>
	</div>
		<div  class="col-xl-1">
	</div>
	<br>
	@endforeach
</div>
</div>
</div>



@endsection