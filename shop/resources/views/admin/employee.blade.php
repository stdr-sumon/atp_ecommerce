@extends('admin.index')

@section('content')

<h4>Employees</h4>
<table class="table  table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Join date</th>
        <th>Type</th>
        <th>Joined By</th>
        <th>Status</th>

      </tr>
    </thead>
    <tbody>
     @foreach($employee as $inv)
      <tr style="background-color: lightcyan">
      <td >{{$inv->id}} </td>
      <td >{{$inv->name}} </td>
      <td >{{$inv->email}} </td>
      <td >{{$inv->phone}} </td>
			<td >{{$inv->join_date}} </td>
			<td >{{$inv->type}} </td>
      <td >{{$inv->joined_by_name}} </td>
      @if($inv->status=='ACTIVE')
			<td style="color:green" >{{$inv->status}} </td>
      @endif
       @if($inv->status!='ACTIVE')
      <td style="color:red" >{{$inv->status}} </td>
      @endif


	    </tr>

      @endforeach
    </tbody>
  </table>
@endsection