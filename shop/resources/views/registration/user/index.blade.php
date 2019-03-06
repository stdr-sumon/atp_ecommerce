@extends('layout.main')

@section('body')
<body>

<div class="container">
  <h2>Registration form</h2>
  <form method="post">
    {{csrf_field()}}
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" placeholder="Enter name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="text" class="form-control" name="phone" placeholder="Enter phone">
    </div>
    <div class="form-group">
      <label for="Address">Address:</label>
      <input type="text" class="form-control" name="address" placeholder="Enter address">
    </div>
    <div class="form-group">
      <label for="userName">User Name:</label>
      <input type="text" class="form-control" name="username" placeholder="Enter username">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" name="password" placeholder="Enter password">
    </div>
    <div class="form-group">
      <label for="Password">Confirm Password:</label>
      <input type="password" class="form-control" name="confirmPassword" placeholder="Re-Enter Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
  @foreach($errors->all() as $err)
      <p class="text-danger">{{$err}}</p>
    @endforeach
</body>
@endsection