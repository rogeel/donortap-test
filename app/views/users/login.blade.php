
<div class="signin-header">
	<a href="#">
		<img alt="Pixel Admin" class="img-responsive logo" src="{{ URL::asset('images/logo-donortap.png')}}" style="display:inline-block">				
	</a> 
</div>

<h1 class="form-header">Please Login</h1>

{{ Form::open(array('url'=>'users/signin', 'class'=>'panel')) }}
	@if(Session::has('message'))
		<p class="{{ Session::get('class') }} alert">{{ Session::get('message') }}</p>
    @endif
    
 	 <div class="form-group">
    {{ Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
    </div>
  	 <div class="form-group">
    {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
 	</div>
    {{ Form::submit('Login', array('class'=>'btn btn-large btn-success btn-block'))}}
{{ Form::close() }}

