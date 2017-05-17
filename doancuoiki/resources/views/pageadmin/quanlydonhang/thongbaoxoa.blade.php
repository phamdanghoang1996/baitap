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
	<div class="panel panel-default" style="margin-left: -100px; width: 60%; margin-top: 50px">
				<div class="panel-body" >
					<h4 style="font-weight: bold">Đã xóa thành công đơn hàng với mã số!</h4>
					<h5>{{$thongtin}}</h5>
				</div>
				<div class="panel-footer">
					<div class="text-center">
					<button class="btn btn-primary"><a href="http://localhost:8000/doancuoiki/public/index.php/pageadmin/quanly/quanlydonhang" style="color:#FFF; text-decoration: none">Xác nhận </a></button>
					</div>
				</div>
			</div>
	</div>
	</div>
</div>
</