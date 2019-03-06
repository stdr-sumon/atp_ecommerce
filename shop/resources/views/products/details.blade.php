@extends('admin.index')

@section('content')
<body>

<div class="container">
  <h2>Add a New Product</h2>
  <div class="form-group">
      <label for="Id">id:</label>
      <input disabled type="text" class="form-control" name="id" placeholder="Enter product name" value = "{{$products->id}}">
    </div>
  <div class="form-group">
      <label for="name">Name:</label>
      <input disabled type="text" class="form-control" name="name" placeholder="Enter product name" value = "{{$products->name}}">
    </div>
    <div class="form-group">
      <label for="buying_price">Buying Price:</label>
      <input type="text" disabled class="form-control" name="buying_price" value = "{{$products->buying_price}}" placeholder="Enter Buying Price">
    </div>
    <div class="form-group">
      <label for="selling_price">Selling Price:</label>
      <input type="text" disabled class="form-control" name="selling_price" placeholder="Enter phone" value = "{{$products->selling_price}}">
    </div>
    
    <div class="form-group">
      <label for="quantitiy">Quantitiy:</label>
      <input type="text" disabled class="form-control" name="quantity" placeholder="Enter quantitiy" value = "{{$products->quantity}}">
    </div>
    <div class="form-group">
      <label for="cetegory">Cetegory:</label>
      <input type="text" disabled class="form-control" name="cetegory" placeholder="Enter cetegory" value = "{{$products->catagory_name}}">
    </div>
    <div class="form-group">
      <label for="cetegory">Sub Cetegory:</label>
      <input type="text" disabled class="form-control" name="Sub cetegory" placeholder="Enter cetegory" value = "{{$products->subcatagory_name}}">
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <input type="text" disabled class="form-control" name="description" placeholder="Enter description" value = "{{$products->description}}">
    </div>
    <div class="form-group">
      <label for="description">Status:</label>
      
      @if ($products->status=="INSTOCK")
      <input type="text" disabled class="form-control" name="description" placeholder="Enter description" value = "{{$products->status}}" style="color:green"> 
      @endif
      @if ($products->status!="INSTOCK")
      <input type="text" disabled class="form-control" name="description" placeholder="Enter description" value = "{{$products->status}}" style="color:red"> 
      @endif
      

    </div>
    <a href="{{route('adminProduct.show')}}" class="btn btn-primary">Show All Items</a>
</div>

</body>

@endsection