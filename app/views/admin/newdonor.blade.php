<!DOCTYPE html>
<html lang="en" class="gt-ie8 gt-ie9 not-ie pxajs">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		{{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}
		{{ HTML::style('packages/pixel/css/pages.css') }}
		{{ HTML::style('packages/pixel/css/pixel-admin.css') }}
		{{ HTML::style('packages/pixel/css/themes.css') }}
		{{ HTML::style('packages/pixel/css/widgets.css') }}
	</head>
	<body>		
	<div class="row">
		<div class="col-md-12">

			@if(Session::has('message'))
				<p class="{{ Session::get('class') }} alert">{{ Session::get('message') }}</p>
		    @endif

		    <ul>
		        @foreach($errors->all() as $error)
		            <li>{{ $error }}</li>
		        @endforeach
		    </ul>

		{{ Form::open(array('url'=>'admin/createdonor', 'class'=>'panel form-horizontal')) }}
		    <div class="panel-heading">
				<span class="panel-title">New Donor</span>
			</div>


		 
		    <div class="panel-body">
			    
				
				<div class="row form-group">
					<label class="col-sm-4 control-label">Firstname:</label>
					<div class="col-sm-8">
						 {{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'First Name')) }}
					</div>
				</div>

				<div class="row form-group">
					<label class="col-sm-4 control-label">Lastname:</label>
					<div class="col-sm-8">
						 {{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Last Name')) }}
					</div>
				</div>

				<div class="row form-group">
					<label class="col-sm-4 control-label">Email:</label>
					<div class="col-sm-8">
						 {{ Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
					</div>
				</div>

				<div class="row form-group">
					<label class="col-sm-4 control-label">Phone:</label>
					<div class="col-sm-8">
						 {{ Form::text('phone', null, array('class'=>'form-control', 'placeholder'=>'Phone')) }}
					</div>
				</div>

	


				<div class="row form-group">
					<label class="col-sm-4 control-label">Location:</label>
					<div class="col-sm-8">
						 {{ Form::select('location', $locations, null, array('class'=>'form-control')) }}


					</div>
				</div>

				<div class="row form-group">
					<label class="col-sm-4 control-label">Location:</label>
					<div class="col-sm-8">
						 {{ Form::select('politicalparty', $politicalparties, null, array('class'=>'form-control')) }}


					</div>
				</div>

				<div class="row form-group">
					<label class="col-sm-4 control-label">Occupation:</label>
					<div class="col-sm-8">
						 {{ Form::select('profession', $professions, null, array('class'=>'form-control')) }}


					</div>
				</div>
			 
			   
			    
			    
			  
			 
			    
				

			</div>
			<div class="panel-footer text-right">
				 {{ Form::submit('Submit', array('class'=>'btn btn-success'))}}
				 {{ Form::close() }}

			</div>
			
		</div>
	</div>
	</body>  

</html>
	



