@extends('layouts.layout')

@section('content')

<style>

    .segment{
        float: left;
    }

    .segment input{
        width: 176%;
    }

    .exist_segment{
        float: left;
        margin-left: 300px;
    }

    input{
        width: 30%;
    }
</style>

<h3> Add audience </h3>

</br>

 <form method="get" action="{{route('audience_add_submit')}}" >
    {{ csrf_field() }}

    <div>
    	<label for="first_name">Enter First Name</label>
    	<div>
    		<input type="text" name="first_name">
    	</div>
    </div>

    </br>

     <div>
        <label for="last_name">Enter Last Name</label>
        <div>
            <input type="text" name="last_name">
        </div>
    </div>

    </br>

     <div>
        <label for="email_address">Enter Email Address</label>
        <div>
            <input type="text" name="email_address">
        </div>
    </div>

    </br>

    <div class="segment">
        <label for="segment">Enter Segment for Audience</label>
        <div>
            <input type="text" name="segment">
        </div>
    </div>

    <div class="exist_segment">
        <label for="exist_segment">Existing Segments</label>
        <div>
            <ul>
                @foreach($segments as $records )
                        @foreach($records as $data)
                            <li>{{ $data }}</li>
                        @endforeach
                @endforeach
            </ul>
        </div>
    </div>

</br>
</br>
</br>
</br>
</br>
</br>

    <div>
        <label for="status">Enter status</label>
        <div>
            <input type="text" name="status">
        </div>
    </div>

</br>

    <a href="{{route('audience_add_submit')}}"> 
    <button type="submit">Add</button>
    </a>

 </form>

</br>

     <a href="{{route('index')}}"> 
        <button type="submit">Back to Menu</button>
     </a>

</br>
</br>

      <a href="{{route('audience')}}"> 
         <button type="submit">Back to Audience</button>
      </a>

</br>
</br>
</br>
</br>


@endsection