<!doctype html>

<html lang="en">
<head>
<meta charset="utf-8">
<title>Bluemine@yield("page-name")</title>
<link href="/css/mainStyle.css" rel='stylesheet' />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/js/main.js"></script>


<body class="bg-light @yield('body-class')">
	<div class="pl-3 myContainer bg-secondary header">
		<span class="float-left title">Bluemine</span>
		<span class="float-right">login</span>
	</div>
	@yield("body-contents")
	<div class="bg-secondary mt-5 py-5 px-3 text-right text-white">
		<p class="my-2">policy</p>
		<p class="my-2">cooperations</p>
		<p class="my-2">fottercontent</p>
		<p class="my-2">fottercontent</p>
	</div>
</body>
</html>