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
			<div class="panel panel-default" style="margin-left: -100px; width: 60%">
				<div class="panel-body" >
					<h3> Đã xóa thành công nhân viên với mã số <span style="font-size: 20px;
					font-weight: bold">{{$thongbaoxoa->manhanvien}}</span> </h3> 
				</div>
				<div class="panel-footer">
					<div class="text-center">
					<button class="btn btn-primary"><a href="http://localhost:8000/doancuoiki/public/index.php/pageadmin/quanly/quanlytaikhoannhanvien" style="color:#FFF; text-decoration: none">Xác nhận </a></button>
					</div>
				</div>
			</div>
	</div>
</div>
</body>
</html>