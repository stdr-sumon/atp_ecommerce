@extends('layout.main')

@section('body')
<body>

	<div class = "container" align="center">
		<h2>Login</h2>
			<form method="post">
			{{csrf_field()}}


		    <div class="form-group" style="width:400px">
		      <label for="username">User Name:</label>
		      <input type="username" class="form-control" name="username" placeholder="User name" value="{{session('username')}}">
		    </div>
		    <div class="form-group" style="width:400px">
		      <label for="pwd">Password:</label>
		      <input type="password" class="form-control" name="password" placeholder="password">
		    </div>
		   <!--  <div class="form-check">
		      <label class="form-check-label">
		        <input class="form-check-input" type="checkbox"> Remember me
		      </label>
		    </div> -->
		    <button type="submit" class="btn btn-primary">Submit</button>
		  </form>
		<a href="">GoToRegistration</a>
		<div>
			{{session('message')}}
		</div>

</div>
</body>
@endsection