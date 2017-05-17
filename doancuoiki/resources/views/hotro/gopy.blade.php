<!DOCTYPE html>
<html>
<head>
	@include('layouts.btrExtend')
</head>
<body>
	@include('layouts.buttonMenu')
	<div class="container">
		<form action="{{route('gopy')}}" class="form-group" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Thư góp ý/Than Phiền</h3>
			</div>
			<div class="panel-body">
			<h4>Họ tên: </h4>
			<input type="text" class="form-control" name="hoten" required="required">
			<h4>Email: </h4>
			<input type="email" class="form-control" name="email" required="required">
			<h4>Số điện thoại: </h4>
			<input type="number" class="form-control" name="sodt" required="required">
			<h4>Nội dung</h4>
			<textarea name="noidung" id="" cols="30" rows="10" class="form-control" style="font-size: 16px" required="required"></textarea>
			</div>
			<div class="panel-footer">
				<div class="text-center">
					<button type="submit" class="btn btn-primary" >Gửi thư cho chúng tôi</button>
				</div>
			</div>
		</div>
		</form>
	</div>
	@include('layouts.footer')
</body>
</html>