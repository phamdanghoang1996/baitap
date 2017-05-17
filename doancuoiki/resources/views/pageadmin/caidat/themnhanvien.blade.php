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
	<h3 style="font-weight: bold">Thêm tài khoản nhân viên: </h3>
	<form action="{{route('themtaikhoan')}}" method="post" class="form-group">
		<div class="col-md-8">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<label for="">Tên đăng nhập:  </label>
					<input type="text" name="taikhoan" class="form-control" style="width: 70%" required="required">
					<label for="">Email</label>
					<input type="email" name="email" class="form-control" style="width: 70%" value="" id=email required="required">
					<label for="">Tạo mật khẩu: </label>
					<input type="password" name="matkhau" class="form-control" style="width: 70%" value="" required="required">
					<label for="">Xác nhận mật khẩu của bạn: </label>
					<input type="password" name="nlmatkhau" class="form-control" style="width: 70%" id="nlmatkhau" required="required">
					<label for="">Ngày sinh: </label>
					<input type="date" name="ngaysinh" class="form-control" style="width: 70%" required="required">
					<label for="">Điện thoại di động: </label>
					<input type="number" name="didong" class="form-control" style="width: 70%" required="required">
					<button type="submit" class="btn btn-success" style="margin-top: 10px;">Thêm tài khoản</button>
				</form>
				<a href="{{url('pageadmin/trangchinh')}}"><button class="btn btn-danger" style="margin-top: 10px; margin-left:20px">Hủy bỏ</button></a>
	</div>
	</form>
</div>	
</body>
</html>