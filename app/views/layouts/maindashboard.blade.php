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
		{{ HTML::style('packages/fancybox/jquery.fancybox.css') }}
		{{ HTML::style('css/main.css')}}

		{{HTML::script('packages/jquery/jquery-1.10.2.js') }}

		<title>Donortap - Dashboard</title>
	</head>

	<script>var init = [];</script>
	<body class="theme-fresh main-menu-animated">
		<div id="main-wrapper">
			
			{{ $content }}

		</div>
		<script>
			init.push(function () {
				var responsiveHelper;
				var breakpointDefinition = {
				    tablet: 1024,
				    phone : 480
				};
		});
		</script>

		
		{{HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
		{{HTML::script('packages/pixel/js/pixel-admin.js') }}
		{{HTML::script('js/date.format.js') }}
		{{HTML::script('packages/fancybox/jquery.fancybox.pack.js') }}
		{{HTML::script('js/functions.js') }}
		<script type="text/javascript">
			init.push(function () {
					
			})
			window.PixelAdmin.start(init);
		</script>
		<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js">'+"<"+"/script>"); </script>

	
	</body>

</html>