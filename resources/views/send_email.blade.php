@extends('layouts.layout')

@section('content')

</br>

<h3> Send Emails </h3>

</br>

<a href="{{route('send_email_submit')}}"> 
    <button type="submit" name="send">Send Emails</button>
</a>

</br>
</br>

<a href="{{route('index')}}"> 
    <button type="submit">Back to Menu</button>
</a>

@endsection