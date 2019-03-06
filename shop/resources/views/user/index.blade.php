@extends('layout.main')

@section('body')
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	  <!-- Brand -->
	  <a class="navbar-brand" href="{{route('products.index')}}" >Home</a>

	  <!-- Links -->
	  <ul class="navbar-nav" >

	    <!-- Dropdown -->
	    <li class="nav-item dropdown" >
	      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
	        Products
	      </a>
	      <div class="dropdown-menu" >
	      	<a class="dropdown-item" href="{{route('products.showallsearch',[0])}}">ALL Category</a>
	     	@foreach($catagory as $cat)
				<a class="dropdown-item" href="{{route('products.showallsearch',[$cat->id])}}">{{$cat->name}} </a>
			@endforeach
	      </div>
	    </li>

	    @if(session()->has('loggedUser'))

		    @if(session()->get('loggedUser')->type == "CUSTOMER")
		    <li class="nav-item">
		      <a class="nav-link" href="{{route('invoice.index')}}">My Account</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="{{route('wishlist.show')}}">Wish List</a>
		    </li>
		    <li class="nav-item">
	      <a class="nav-link" href="{{route('cart.showAll')}}">Cart List</a>
	    </li>
	    <li class="nav-item">
		      <a class="nav-link" href="{{route('logout.index')}}">Logout</a>
		    </li>
		    @endif
		@endif

		@if(!session()->has('loggedUser'))
		    <li class="nav-item">
		      <a class="nav-link" href="{{route('login.index')}}">Login</a>
		    </li>
		@endif
	  </ul>
	</nav>
	<br>

	@yield('content')


</body>
@endsection