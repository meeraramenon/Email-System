@extends('layouts.layout')

@section('content')

</br>

<h3> Delete Audience </h3>

</br>

<h5> Are you sure you want to delete User ID: {{ $id }} with First Name: {{ $first_name }} ?</h5>
</br>
<a href="{{route('audience')}}"> 
    <button type="submit">Cancel</button>
</a>

<a href="{{route('audience_delete_submit', [$id])}}"> 
    <button style=" margin-left: 20px;" type="submit">Delete</button>
</a>

</br>
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