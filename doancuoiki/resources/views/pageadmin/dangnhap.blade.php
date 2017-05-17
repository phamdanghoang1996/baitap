<!DOCTYPE html>
<html>
<head>
	@include('layouts.btrExtend')
</head>
<body>
<div class="container" style="width: 500px">
	<form action="{{route('dangnhap')}}" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<div class="panel panel-info">
				<div class="heading"><h2 style="font-weight: bold; font-size: 25px">Đăng nhập ADMIN</h2></div>
				<div class="body">
					<div class="col-md-12">
						<label for="taikhoan" style="font-size: 20px">Tài khoản: </label>
						<input type="text" name="username" class="form-control">
					</div>
					<div class="col-md-12">
						<label for="matkhau" style="font-size: 20px">Mật khẩu</label>
						<input type="password" class="form-control" name="password">
					</div>
				</div>
				<div class="footer">
					<div class="text-center">
						<button type="submit" class="btn btn-primary" style="margin-top: 20px">Đăng nhập</button>
						<button type="button" class="btn btn-danger" style="margin-top: 20px">Quên mật khẩu</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
</body>
</html>