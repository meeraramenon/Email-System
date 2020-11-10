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

<h3> Designs table </h3>

</br>

<table >
	<thead style="text-align: center;">
		<tr>
			<th style="width: 90px;">Design ID</th>
			<th style="width: 120px;">Design</th>
			<th>Body</th>
		</tr>
	</thead>

	<tbody style="text-align: center;">
		@foreach($designs_all as $records )
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

<a href="{{route('designs_create')}}"> 
    <button type="submit">Create a Design</button>
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