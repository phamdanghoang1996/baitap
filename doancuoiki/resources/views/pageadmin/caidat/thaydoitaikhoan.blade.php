<!DOCTYPE html>
<html>
<head>
	@include('layouts.btrExtend')
	<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
</head>
<body>
<div class="row">
	<div class="col-md-4">
		@include('layouts.buttonMenuAdmin')
	</div>	
	<div class="col-md-8">
	<h3 style="font-weight: bold">Thay đổi tài khoản</h3>
	<form action="{{route('thaydoimatkhau')}}" method="post" class="form-group">
		<div class="col-md-8">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<label for="">Tên tài khoản: </label>
					<input type="text" name="taikhoan" class="form-control" style="width: 70%" required="required">
					<label for="">Mật khẩu cũ: </label>
					<input type="password" name="matkhau" class="form-control" style="width: 70%" required="required">
					<label for="">Nhập mật khẩu mới: </label>
					<input type="password" name="matkhaumoi" class="form-control" style="width: 70%" value="" id="matkhaumoi" required="required">
					<label for="">Nhập lại mật khẩu: </label>
					<input type="password" name="nlmatkhaumoi" class="form-control" style="width: 70%" value="" id="nlmatkhaumoi" required="required">
					<button type="submit" class="btn btn-success" style="margin-top: 10px;">Thay đổi</button>
				</form>
				<a href="{{url('pageadmin/trangchinh')}}"><button class="btn btn-danger" style="margin-top: 10px; margin-left:20px">Hủy bỏ</button></a>
	</div>
	</form>
</div>	
</body>
</html>