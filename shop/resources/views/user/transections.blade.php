@extends('user.index')

@section('content')

<h4>Transections</h4>
<table class="table  table-hover">
    <thead>
      <tr>
        <th>Invoice ID</th>
        <th>Total Price</th>
        <th>Date Time</th>
        <th>Status</th>

      </tr>
    </thead>
    <tbody>
     @foreach($invoice as $inv)


      <tr style="background-color: lightgray">

			<td >{{$inv->id}} </td>
			<td >{{$inv->price}} </td>
      <td >{{$inv->datetime}} </td>
      @if($inv->status=='ON_PROCESS' || $inv->status=='CANCELLED')
			<td style="color:red" >{{$inv->status}} </td>
      @endif
       @if($inv->status=='DELIVERED')
      <td style="color:green" >{{$inv->status}} </td>
      @endif

	    </tr>
      @endforeach
    </tbody>
  </table>
@endsection