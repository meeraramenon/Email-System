@extends('layouts.layout')

@section('content')

<style>

    .design{
        float: left;
    }

    .create_design{
        float: left;
        margin-left: 10%;
    }

    .segment{
        margin-top: 80px;
    }

    input{
        width: 30%;
    }
</style>


</br>

<h3> Create a Campaign </h3>

</br>

 <form method="get" action="{{route('campaigns_submit')}}" >
    {{ csrf_field() }}

    <div>
    	<label for="campaign">Enter Campaign name</label>
    	<div>
    		<input type="text" name="campaign">
    	</div>
    </div>

    </br>

    <div class="design">
    	<label for="design">Choose a Design for this Campaign</label>
    	<div>
    		<select style="width: 230px;" name="design[]">
                @foreach($designs as $records )
                    @foreach($records as $data)
                        <option value="<?php echo $data ?>" >{{ $data }}</option>
                    @endforeach
                @endforeach
            </select>
    	</div>
    </div>

    <div class="create_design">
        <label for="create_design">Or create a Design</label>
        <div>
           <a href="{{route('designs_create')}}"> 
                <button type="button">Create a Design</button>
           </a>
        </div>
    </div>

     <div class="segment">
        <label for="segment">Choose Audience segment for this Campaign</label>
        <div>
            <select style="width: 230px;" name="segment[]">
                @foreach($segments as $records )
                    @foreach($records as $data)
                        <option value="<?php echo $data ?>" >{{ $data }}</option>
                    @endforeach
                @endforeach
            </select>
        </div>
    </div>

    </br>

    <div>
    	<label for="dateTime">Date</label>
    	<div>
    		<input type="date" name="dateTime">
    	</div>
    </div>

    </br>

    <button type="submit">Create</button>

 </form>

</br>

 <a href="{{route('campaigns')}}"> 
    <button type="submit">Back to Campaigns</button>
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