<!DOCTYPE html>
<html>
<head>
	@include('layouts.btrExtend')
</head>
<body>
<div class="row">
	<div class="col-md-4">
			@include('layouts.buttonMenuAdmin')
	</div>
	<div class="col-md-8">
	<h3 style="color:red">Thông báo!!</h3>
			@foreach($thongtin as $key)
				<form action="maphanhoi={{$key->maph}}" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" value="{{$key->maph}}" name="maphanhoi">
					<button type="submit" class="btn btn-success">XÁC NHẬN XÓA</button>
				</form>
			@endforeach
	</div>
</div>
</body>
</html>