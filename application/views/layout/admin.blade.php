<!DOCTYPE html>
<html>
<head>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>
      ::: DNF-STYLE :::
    </title>

	<script type="text/javascript" src="/system/script.js"></script>
	<script type="text/javascript" src="/system/publiscript.js"></script>


	<link rel="stylesheet" type="text/css" href="http://wbpreview.com/previews/WB01587L5/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="http://wbpreview.com/previews/WB01587L5/css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="http://wbpreview.com/previews/WB01587L5/css/bootstrap-responsive-fluid.css" />

	{{ HTML::script('js/modernizr.js') }}

    {{ HTML::style('css/prometheus.css') }}
	{{ HTML::style('css/menu.css') }}

	<link rel="stylesheet" type="text/css" href="/system/styles.css" />
	{{ HTML::style('css/booking.css') }}
	{{ HTML::style('css/override.css') }}


</head>
<body>

	<div id="container" class="adminContainer">
		<div class="container">
			{{ $content }}
		</div>
	</div>

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>

	{{ HTML::script('js/menu.js') }}
	{{ HTML::script('js/bootstrap.js') }}
	{{ HTML::script('js/admindnf.js') }}


</body>
</html>
