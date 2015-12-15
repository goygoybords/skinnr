	<nav class="light-blue lighten-1" role="navigation">
		<div class="nav-wrapper container">
			<a id="logo-container" href="#" class="brand-logo">Skinnr</a>
			<ul class="right hide-on-med-and-down">
				<li>
					@if (Auth::check())
						<a href = "{{ route('getLogout') }}">Logout</a>
					@else
						<a href="{{ URL::to('auth/login') }}">Login</a>
					@endif
					
				</li>
            </ul>
            <ul id="nav-mobile" class="side-nav">
            	<li>
            		@if (Auth::check())
						<a href = "">Logout</a>
					@else
						<a href="{{ URL::to('auth/login') }}">Login</a>
					@endif
            		<!-- <a href="{{ URL::to('auth/login') }}">Login</a> -->
            	</li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse">
        		<i class="material-icons">menu</i>
        	</a>
        </div>
    </nav>