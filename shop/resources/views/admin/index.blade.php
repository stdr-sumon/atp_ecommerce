@extends('layout.main')

@section('body')
<body>
<div align="right">
</div>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	  <!-- Brand -->
	  <a class="navbar-brand" href="{{route('admin.index')}}" >Home</a>

	  <!-- Links -->
	  <ul class="navbar-nav" >

	    <!-- Dropdown -->
	    <li class="nav-item">
	      <a class="nav-link" href="{{route('adminProduct.show')}}">Products</a>
	    </li>

	    @if(session()->get('loggedUser')->type == "ADMIN")
		<li class="nav-item dropdown" >
	      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" >
	        Addnew
	      </a>
	      <div class="dropdown-menu">
			<a class="dropdown-item" href="{{route('adminProduct.addProducts')}}">Product</a>
			<a class="dropdown-item" href="{{route('admin.reg')}}">Employee</a>
			<a class="dropdown-item" href="#">Category</a>
			<a class="dropdown-item" href="#">Sub-category</a>

	      </div>
	    </li>


	    <li class="nav-item">
	      <a class="nav-link" href="{{route('reg.employeeAll')}}">Employees</a>
	    </li>

	    <li class="nav-item">
	      <a class="nav-link" href="#">Clients</a>
	    </li>

	    <li class="nav-item dropdown">
	      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
	        Accounts
	      </a>
	      <div class="dropdown-menu">
			<!-- <a class="dropdown-item" href="#">Recent</a> -->
			 @if(session()->get('loggedUser')->type == "ADMIN")
			<a class="dropdown-item" href="{{route('invoice.salesAdmin')}}">Sales</a>
			@endif
			@if(session()->get('loggedUser')->type == "SALESMAN")
			<a class="dropdown-item" href="{{route('invoice.sales')}}">Sales</a>
			@endif
			<a class="dropdown-item" href="{{route('report.buyHistory')}}">Buy</a>
			<a class="dropdown-item" href="{{route('report.orderList')}}">Orderlist</a>
	      </div>
	    </li>
	    @endif

	    @if(session()->get('loggedUser')->type == "SALESMAN")
	    <li class="nav-item">
	      <a class="nav-link" href="{{route('invoice.sales')}}">SALES</a>
	    </li>
	     @endif
	      @if(session()->has('loggedUser'))
	      <li class="nav-item">
		      <a class="nav-link" href="{{route('logout.index')}}">Logout</a>
		    </li>
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