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
		@if($thongbao==1)
		<h4>Đã thêm thành công</h4>
		@else
		<h4>{{$thongbao}}</h4>
		@endif
	</div>
</div>
</body>
</html>