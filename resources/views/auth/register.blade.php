@extends('main')
	@section('content')
	 <div class="container">
	 	{!! Form::open(array('route' => 'postRegister' , 'method' => 'post')) !!}
		 	<label>Username: </label>
		 	<input type = "text" name = "username" value ="{{ Input::old('username') }}">

		 	<label>Password: </label>
		 	<input type = "password" name = "password">

		 	<label>Retype Password:</label>
		 	<input type = "password" name = "password_confirmation">

		 	<label>Full Name</label>
		 	<input type = "text" name = "name" value = "{{ Input::old('name') }}">

		 	<label>Position</label>
		 	<input type = "text" name = "position" value = "{{ Input::old('position') }}">

		 	<input type = "submit" name = "register" value = "Register">
	 	{!! Form::close() !!}
	 <div>

	 	<br>
  		@if($errors->has())
      		@foreach ($errors->all() as $error)
      			<div id="error_message">{{ $error }}</div>
			@endforeach

		@elseif (Session::has('msg'))
   			<div id="error_message">{{ Session::get('msg') }}</div>
      	@endif

	@endsection
