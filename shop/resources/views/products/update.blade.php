@extends('admin.index')

@section('content')
<body>

<div class="container">
  <h2>Update Product: {{$products->name}}</h2>
  <form method="post">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$products->id}}">
    <div class="form-group">
      <div class="form-group">
      <label for="Id">Id:</label>
      <input disabled type="text" class="form-control" placeholder="Enter product name" value = "{{$products->id}}">
    </div>
      <label for="name">Name:</label>
      <input  disabled type="text" class="form-control" name="name" placeholder="Enter product name" value = "{{$products->name}}">
    </div>
    <div class="form-group">
      <label for="buying_price">Buying Price:</label>
      <input  type="text"  class="form-control" name="buying_price" placeholder="Enter Buying Price">
    </div>
    <div class="form-group">
      <label for="selling_price">Selling Price:</label>
      <input type="text"  class="form-control" name="selling_price" placeholder="Enter Selling Price">
    </div>
    
    <div class="form-group">
      <label for="quantitiy">Quantitiy:</label>
      <input type="text"  class="form-control" name="quantity" placeholder="Enter quantitiy">
    </div>
    
   
    @if ($products->status=="INSTOCK")
      <input type="text" disabled class="form-control" name="description" placeholder="Enter description" value = "{{$products->status}}" style="color:green"> 
      @endif
      @if ($products->status!="INSTOCK")
      <input type="text" disabled class="form-control" name="description" placeholder="Enter description" value = "{{$products->status}}" style="color:red"> 
      @endif
      <br>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <br>
  @foreach($errors->all() as $err)
      <p class="text-danger">{{$err}}</p>
  @endforeach
    <h3 class="text-success">{{session('message')}}</h3>
</div>

</body>

@endsection