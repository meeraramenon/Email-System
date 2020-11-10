@extends('layouts.layout')

@section('content')

<style>
	table {
	  border-collapse: collapse;
	  width: 80%;
    }

    table, th, td {
	  border: 1px solid #A9A9A9;
	  height: 50px;
	  color: #A9A9A9;
	  text-align: center;
    }
</style>

</br>

<h3>Import Audience</h3>

</br>

<div>

	<form method="get" action="{{route('audience_import_submit')}}" enctype="multipart/form-data">
		@csrf
		<div>
			<label for="file"> Choose File </label>
			<input type="file" name="file"/>
		</div>
	</br>

	<h6> Excel sheet should have the following headers </h6>
	<table>
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email Address</th>
				<th>Segment</th>
				<th>Status</th>
			</tr>
		</thead>
    </table>

    </br>

		<input type="submit" value="Submit" />
	</form>

</br>

	<a href="{{route('audience')}}"> 
	    <button type="submit">Back to Audience</button>
	</a>

</br>
</br>

	<a href="{{route('index')}}"> 
	    <button type="submit">Back to Menu</button>
	</a>

</br>
</br>
</br>
</br>

@endsection