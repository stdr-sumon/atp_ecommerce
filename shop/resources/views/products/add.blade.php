@extends('admin.index')

@section('content')
<body>

<div class="container">
  <h2>Add a New Product</h2>
  <form method="post">
    {{csrf_field()}}
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" placeholder="Enter product name" value = "{{old('name')}}">
    </div>
    <div class="form-group">
      <label for="buying_price">Buying Price:</label>
      <input type="text" class="form-control" name="buying_price" value = "{{old('buying_price')}}" placeholder="Enter Buying Price">
    </div>
    <div class="form-group">
      <label for="selling_price">Selling Price:</label>
      <input type="text" class="form-control" name="selling_price" placeholder="Enter phone" value = "{{old('selling_price')}}">
    </div>
    <div class="form-group" style="width:200px">
      <label for="category">Category:</label>
      <select class="form-control" name="category">
        <option value=0>Select a Category</option>
         @foreach($catNames as $cat)
        <option value="{{$cat->subcategory_id}}">{{$cat->cat_sub}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="quantitiy">Quantitiy:</label>
      <input type="text" class="form-control" name="quantity" placeholder="Enter quantitiy" value = "{{old('quantity')}}">
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <input type="text" class="form-control" name="description" placeholder="Enter description" value = "{{old('description')}}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @foreach($errors->all() as $err)
      <p class="text-danger">{{$err}}</p>
    @endforeach
    <h3 class="text-success">{{session('message')}}</h3>
</div>

</body>

@endsection