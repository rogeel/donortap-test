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
		{{ HTML::style('css/main.css')}}
		<title>Donortap</title>
	</head>

	
	<body class="theme-fresh page-signin-alt">
		{{ $content }}
		{{HTML::script('packages/jquery/jquery-1.10.2.js') }}
		{{HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
		{{HTML::script('packages/pixel/js/pixel-admin.js') }}
	
	</body>

</html>