<!DOCTYPE html>
<html>
<head>

    <title>
      ::: DNF-STYLE :::
    </title>

    <meta charset=UTF-8" />

	<script type="text/javascript" src="/system/script.js"></script>
	<script type="text/javascript" src="/system/publiscript.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
    {{ HTML::script('js/bootstrap.js') }}

    {{ HTML::style('css/bootstrap.css') }}
<!--    {{ HTML::style('css/bootstrap-responsive.css') }}-->
    {{ HTML::style('css/booking.css') }}
	<link rel="stylesheet" type="text/css" href="/system/styles.css" />
    {{ HTML::style('css/override.css') }}



</head>
<body>

    <div id="container">
        {{ $content }}
    </div>


    {{ $menu }}
  
</body>
</html>
