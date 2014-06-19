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
		<div class="panel widget-notifications">
			<div class="panel-heading">
				<span class="panel-title"><i class="panel-title-icon fa fa-plus"></i>{{{$donor->firstname}}} {{{$donor->lastname}}} Contributions</span>
			</div> <!-- / .panel-heading -->
			<div class="panel-body padding-sm">
				<div class="notifications-list">
					@foreach($contributions as $contribution)
					<div class="notification">
						<div class="notification-title text-success">{{{$contribution->firstname}}} {{{$contribution->lastname}}}</div>
						<div class="notification-description">{{$contribution->politicalparty}}</div>
						<div class="notification-description">{{$contribution->location}}</div>
						<?php $date = new DateTime($contribution->date); ?>
						<div class="notification-ago">{{ $date->format('l, F d, Y')}}</div>
						<div class="notification-icon bg-success">${{$contribution->amount}}</div>
					</div>
					@endforeach	
					
				</div> 	
			</div> 
		</div>  
		{{$contributions->links()}}  
	</body>  

</html>
	
