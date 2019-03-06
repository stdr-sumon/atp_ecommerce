@extends('admin.index')

@section('content')
<!-- <div class="row">
<div class="col-xl-2">
  <h2>List Group With Linked Items</h2>
  <div class="list-group">
    <a href="#" class="list-group-item list-group-item-action">First item</a>
    <a href="#" class="list-group-item list-group-item-action">Second item</a>
    <a href="#" class="list-group-item list-group-item-action">Third item</a>
  </div>
</div>
</div> -->
<div>
   <form method="post">
    {{csrf_field()}}
    <div style="width:200px">
    <label for="category">Category:</label>
      <select class="form-control" name="category">
      @if($categ == 0)
        <option value=0>All</option>
        @endif

        @foreach($catagory as $cat)
        @if($categ == $cat->id)
        <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endif
        @endforeach
        @if($categ != 0)
        <option value=0>All</option>
        @endif

        @foreach($catagory as $cat)
        @if($categ != $cat->id)
        <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endif
        @endforeach
        
         
      </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
 <!--  </form> -->
</div>
<br>
<div>
   <!-- <form method="post"> -->
    <!-- {{csrf_field()}} -->
    <div style="width:400px">
    <label for="category">Search</label><br>
      <input type="text"  name="search" placeholder="Search" value = "{{$srch}}">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<table class="table  table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Sub-Category</th>
        <th>Buying Price</th>
        <th>Selling Price</th>
        <th>Quantity</th>
        <th>Status</th>
        <th>Options</th>
      </tr>
    </thead>
    <tbody>
     @foreach($products as $prd)
	    <tr>
			<td >{{$prd->id}} </td>
			<td >{{$prd->name}} </td>
			<td >{{$prd->catagory_name}} </td>
			<td >{{$prd->subcatagory_name}} </td>
			<td >{{$prd->buying_price}} </td>
			<td >{{$prd->selling_price}} </td>
			<td >{{$prd->quantity}} </td>
      @if ($prd->status=="INSTOCK")
			<td style="color: green">{{$prd->status}} </td>
      @endif
      @if ($prd->status!="INSTOCK")
      <td style="color: red">{{$prd->status}} </td>
      @endif
			<td ><a href="{{route('adminProduct.details', [$prd->id])}}">Details</a> 
          @if(session()->get('loggedUser')->type == "ADMIN")| 
          <a href="{{route('adminProduct.edit', [$prd->id])}}">Edit</a> | 
  			 <a href="{{route('adminProduct.update', [$prd->id])}}">Update</a>
         @endif
      </td>

	    </tr>
      @endforeach
    </tbody>
  </table>



@endsection