@extends('user.index')

@section('content')
<body>

<div class="container">
  <h2>Cart Checkout</h2>
    <div class="form-group">
      <label for="name">Name:</label>
      <input disabled type="text" class="form-control" name="name" value="{{$user->name}}" >
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input disabled type="text" class="form-control" name="email" value="{{$user->email}}">
    </div>
    <div class="form-group">
      <label for="phone">Phone:</label>
      <input disabled type="text" class="form-control" name="phone" value="{{$user->phone}}">
    </div>
    <div class="form-group">
      <label for="Address">Address:</label>
      <input disabled type="text" class="form-control" name="address" value="{{$user->address}}">
    </div>
    <hr>
    <table class="table  table-hover">
    <thead>
      <tr style="background-color: lightgray; color: brown; font-size: 20px">
      <th>Total</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>Quantity: {{$quantity}}</th>
        <th>Price: {{$price}}</th>
        <th></th>
      </tr>
    </thead>
  </table>
<div>
   <form method="post">
    {{csrf_field()}}

    <div class="form-group" style="width:200px">
      <label for="type">Payment Type:</label>
      <select class="form-control" name="type">
        <option value=0>Cash on Delivery</option>
        <option value=1>Other</option>
      </select>
    </div>
      <button type="submit" class="btn btn-success" style="float: left; ">Done Checkout</button>
      </div>
</div>
<br>
<div>

  </form>
</div>

</body>
@endsection