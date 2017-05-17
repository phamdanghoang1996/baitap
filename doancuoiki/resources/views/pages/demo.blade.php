<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Hello</h3>
	<form action="{{route('demo')}}" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">



		
	</form>
</body>
</html>