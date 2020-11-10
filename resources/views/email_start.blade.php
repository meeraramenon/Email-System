@extends('layouts.layout')

@section('content')

</br>

<h3> Main Menu </h3>

</br>

<a href="{{route('send_email')}}"> 
    <button type="submit" name="send">Send Emails</button>
</a>

</br>
</br>

<a href="{{route('campaigns')}}"> 
    <button type="submit">Campaigns</button>
</a>

</br>
</br>

<a href="{{route('audience')}}"> 
    <button type="submit">Audience</button>
</a>

</br>
</br>

<a href="{{route('designs')}}"> 
    <button type="submit">Designs</button>
</a>

</br>
</br>

<a href="{{route('email_report')}}"> 
    <button type="submit">Email Reports</button>
</a>

@endsection