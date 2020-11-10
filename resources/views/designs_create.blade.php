@extends('layouts.layout')

@section('content')

</br>

<h3> Create Design </h3>


</br>

<section>
		<form method="get" action="{{route('designs_submit')}}">
			@csrf
	        <div>
	            <label for="design">Design Name</label>
	                <div>
	                    <input type="text" name="design">
	                </div>
	        </div>

	  </br>

	        <div style="width: 80%;">
				<textarea id="body" name="body">
					
				</textarea>
		    </div>

	  </br>

	        <input type="submit" name="submit" value="submit">

		</form>

	    </br>

            <a href="{{route('designs')}}"> 
    			<button type="submit">Back to Designs</button>
			</a>

		</br>
	    </br>

	        <a href="{{route('index')}}"> 
	            <button type="submit">Back to Menu</button>
	        </a>

		</div>

</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/ax6z26bkj4s3rczcuhyo6ffju93ec9hidd28y9n477tpzqe4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>	
<script>
tinymce.init({
	selector:'#body'
});
</script>

</br>
</br>
</br>
</br>

@endsection