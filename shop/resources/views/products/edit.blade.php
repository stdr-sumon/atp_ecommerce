@extends('admin.index')

@section('content')
<body>

<div class="container">
  <h2>Edit Product: {{$products->name}}</h2>
  <form method="post">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$products->id}}">
    <div class="form-group">
      <div class="form-group">
      <label for="Id">Id:</label>
      <input disabled type="text" class="form-control" placeholder="Enter product name" value = "{{$products->id}}">
    </div>
      <label for="name">Name:</label>
      <input  type="text" class="form-control" name="name" placeholder="Enter product name" value = "{{$products->name}}">
    </div>
    <div class="form-group">
      <label for="buying_price">Buying Price:</label>
      <input disabled type="text"  class="form-control" name="buying_price" value = "{{$products->buying_price}}" placeholder="Enter Buying Price">
    </div>
    <div class="form-group">
      <label for="selling_price">Selling Price:</label>
      <input type="text"  class="form-control" name="selling_price" placeholder="Enter phone" value = "{{$products->selling_price}}">
    </div>
    
    <div class="form-group">
      <label for="quantitiy">Quantitiy:</label>
      <input type="text"  class="form-control" name="quantity" placeholder="Enter quantitiy" value = "{{$products->quantity}}">
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <input type="text" class="form-control" name="description" placeholder="Enter description" value = "{{$products->description}}">
    </div>
    <div class="form-group" style="width:200px">
      <label for="category">Category:</label>
      <select class="form-control" name="category">
        @foreach($catNames as $cat)
        @if($cat->subcategory_id == $products->subcatagoryid)
        <option value="{{$cat->subcategory_id}}">{{$cat->cat_sub}}</option>
        @endif

        @endforeach

         @foreach($catNames as $cat)
        <!-- <option value="{{$cat->subcategory_id}}">{{$cat->cat_sub}}</option> -->
        @if($cat->subcategory_id != $products->subcatagoryid)
        <option value="{{$cat->subcategory_id}}">{{$cat->cat_sub}}</option>
        @endif
        @endforeach
      </select>
    </div>



    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <br>
  <form method="post">
    {{csrf_field()}}
  @if ($products->status=="INSTOCK")
      <input type="text" disabled class="form-control" name="description" placeholder="Enter description" value = "{{$products->status}}" style="color:green"> 
      @endif
      @if ($products->status!="INSTOCK")
      <input type="text" disabled class="form-control" name="description" placeholder="Enter description" value = "{{$products->status}}" style="color:red"> 
      @endif
      <br>
      <button type="submit" class="btn btn-primary">Suspend</button>
    </form>
  @foreach($errors->all() as $err)
      <p class="text-danger">{{$err}}</p>
  @endforeach
    <h3 class="text-success">{{session('message')}}</h3>
</div>

</body>

@endsection