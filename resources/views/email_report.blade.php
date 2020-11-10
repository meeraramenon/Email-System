@extends('layouts.layout')

@section('content')

<style>
	table {
  border-collapse: collapse;
  width: 80%;
}

table, th, td {
  border: 1px solid black;
  height: 50px;
}
</style>

</br>

<h3> Email Report </h3>

</br>

<table >
	<thead>
		<tr>
			<th>S.NO</th>
			<th>ID</th>
			<th>First Name</th>
			<th>Email Address</th>
			<th>Segment</th>
			<th>Campaign ID</th>
			<th>Campaign</th>
			<th>Status</th>
			<th>Issue</th>
			<th>Date & Time</th>
		</tr>
	</thead>

	<tbody>
		@foreach($email_report_all as $records )
		<tr>
			@foreach($records as $data)
			<td> {{ $data }} </td>
			@endforeach
		    </td>
		</tr>
		@endforeach
	</tbody>
</table>
</br>

<a href="{{route('index')}}"> 
    <button type="submit">Back to Menu</button>
</a>


</br>
</br>
</br>
</br>

@endsection