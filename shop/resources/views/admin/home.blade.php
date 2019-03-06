@extends('admin.index')

@section('content')
<div class="row">

	<div  class="col-xl-3">
	  <div class="card" style="width:400px">
	    <img class="card-img-top" src="images/product.jpg" alt="Card image" width="400" height="300">
	    <div class="card-body">
	      <h4 class="card-title">Products</h4>
	      <!-- <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p> -->
	      <a href="{{route('adminProduct.show')}}" class="btn btn-primary">View All</a>
	    </div>
	  </div>
	</div>
	@if(session()->get('loggedUser')->type == "ADMIN")

	<div  class="col-xl-1">

	</div>
	<div  class="col-xl-3">
	  <div class="card" style="width:400px">
	    <img class="card-img-top" src="images/employee.jpg" alt="Card image" width="400" height="300">
	    <div class="card-body">
	      <h4 class="card-title">Employees</h4>

	      <a href="{{route('reg.employeeAll')}}" class="btn btn-primary">View All</a>
	    </div>
	  </div>
	</div>

	<div  class="col-xl-1">

	</div>
	@endif
	<div  class="col-xl-3">
	  <div class="card" style="width:400px">
	    <img class="card-img-top" src="images/account.jpg" alt="Card image" width="400" height="300">
	    <div class="card-body">
	    @if(session()->get('loggedUser')->type == "ADMIN")
	      <h4 class="card-title">Accounts</h4>
	       <a href="{{route('report.orderList')}}" class="btn btn-primary">View Details</a>
	      @endif
	      @if(session()->get('loggedUser')->type == "SALESMAN")
	      <h4 class="card-title">SALES</h4>
	       <a href="{{route('invoice.sales')}}" class="btn btn-primary">View Details</a>
	      @endif


	    </div>
	  </div>
	</div>
</div>
@endsection