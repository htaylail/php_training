@extends('userData.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('userData.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    {{-- <form action="{{ route('userData.update',$userData->id) }}" method="POST"> --}}
        {{-- {{ csrf_field() }}
        {{ method_field('PATCH') }} --}}
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" id="name" name="name" value="{{ $userData->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email ID:</strong>
                    <input type="text" class="form-control" id="email" name="email" value ="{{ $userData->email }}" placeholder="Email ID">
                </div>
            </div>
            <!-- phone -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="text" class="form-control" id ="phone" name="phone" value ="{{ $userData->phone }}" placeholder="Phone Number">
                </div>
            </div>
            <!-- city-->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>City:</strong>
                    <input type="text" class="form-control" id = "city" name="city" value ="{{ $userData->city }}" placeholder="city">
                </div>
            </div>

            <!-- -->
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button class="btn btn-primary" id="update_data" value="{{ $userData->id }}">Submit</button>
            </div>
        </div>
   
    {{-- </form> --}}
    <script>
        $(document).ready(function(){

    $(document).on("click", "#update_data", function() { 
        var url = "{{URL('userData/'.$userData->id)}}";
        var id= 
		$.ajax({
			url: url,
			type: "PATCH",
			cache: false,
			data:{
                _token:'{{ csrf_token() }}',
				type: 3,
				name: $('#name').val(),
				email: $('#email').val(),
				phone: $('#phone').val(),
				city: $('#city').val()
			},
			success: function(dataResult){
                dataResult = JSON.parse(dataResult);
             if(dataResult.statusCode)
             {
                window.location = "/userData";
             }
             else{
                 alert("Internal Server Error");
             }
				
			}
		});
	}); 
});

    </script>
@endsection
     