@extends('main')
	@section('content')
		<div class="container">
			{!! Form::open(array('route' => 'postLogin' , 'method' => 'post')) !!}
				<div class="row">
	 		   		<div class="input-field col s12">
		  				<input type="text" name = "username" value ="{{ Input::old('username') }}">
		  				<label for="username">Username</label>
	        		</div>
	        	</div>
	        	 <div class="row">
	        	 	<div class="input-field col s12">
	              		<input id="password" name = "password" type="password">
	              		<label for="password">Password</label>
	            	</div>
	      		</div>
	      		<div class = "row">
	      			<div class="input-field col s12">
	      				<input type="checkbox" id="remember_me" name = "remember_me">
	      				<label for = "remember_me">Remember me</label>
	  				<div>
	      		</div>
	      		<br>
			  	<button class="btn waves-effect waves-light" type="submit" name="login">
			  		Login<i class="material-icons right">send</i>
	  			</button>
			{!! Form::close() !!}
			<br>
	  		@if($errors->has())
	  			@foreach ($errors->all() as $error)
	      			<div id="error_message">{{ $error }}</div>
				@endforeach

			@elseif (Session::has('msg'))
	   			<div id="error_message">{{ Session::get('msg') }}</div>
	      	@endif
		</div>
	@endsection