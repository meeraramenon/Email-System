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

<h3> Campaigns table </h3>
</br>

<table >
	<thead style="text-align: center;">
		<tr>
			<th>Campaign ID</th>
			<th>Campaign Name</th>
			<th>Design corresp. to Campaign</th>
			<th>Segment of Users</th>
			<th>Date & Time</th>
		</tr>
	</thead>

	<tbody style="text-align: center;">
		@foreach($campaigns_all as $records )
		<tr>
			@foreach($records as $data)
			<td> {{ $data }} </td>
			@endforeach
		</tr>
		@endforeach
	</tbody>
</table>
</br>
</br>

<a href="{{route('campaigns_create')}}"> 
    <button type="submit">Create a Campaign</button>
</a>

<a href="{{route('index')}}"> 
    <button type="submit">Back to Menu</button>
</a>

</br>
</br>
</br>
</br>

@endsection