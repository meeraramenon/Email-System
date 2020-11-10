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

.dropdown{
    display:inline-block;
    position:relative;
  }
  
  .dropdown:hover button{
    background-color:#D3D3D3;
  }
  
  .dropdown div{
    background-color:#fff;
    box-shadow:0 4px 8px rgba(0,0,0,0.2);
    z-index:1;
    visibility:hidden;
    position:absolute;
    min-width:100%;
    opacity:0;
    transition:.3s;
  }
  
  .dropdown:hover div{
    visibility:visible;
    opacity:1;
  }
  
  .dropdown div a{
    display:block;
    text-decoration:none;
    padding:8px;
    color:#000;
    transition:.1s;
    white-space:nowrap;
  }
  
  .dropdown div a:hover{
    background-color:#D3D3D3;
  }
</style>

</br>

<h3> Audience table </h3>
</br>
<table >
	<thead style="text-align: center;">
		<tr>
			<th>User ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email Address</th>
			<th>Segment</th>
			<th>Status</th>
      <th>Action</th>	
		</tr>
	</thead>

	<tbody>
		@foreach($audience_all as $records )
		<tr>
			@foreach($records as $data)
			<td style="text-align: center;"> {{ $data }} </td>
			@endforeach
			<td style="padding-left: 30px;"> <a href="{{route('audience_delete', [$records->id, $records->first_name])}}"> 
    				<button type="submit">Delete audience</button>
				 </a>
		    </td>
		</tr>
		@endforeach
	</tbody>
</table>
</br>
</br>

<div class = "dropdown">
	<button> Manage Audience </button>
	<div>
		<a href="{{route('audience_add')}}">Add Audience</a>
		<a href="{{route('audience_import')}}">Import Audience</a>
	</div>
</div>

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