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
					<h3><span style="font-size: 20px;
					font-weight: bold">Đã xóa thành công sản phẩm</span> </h3> 
				</div>
				<div class="panel-footer">
					<div class="text-center">
						<a href="http://localhost:8000/doancuoiki/public/index.php/pageadmin/chinhsua/thongtinsanpham" style="color:#FFF; text-decoration: none"><button class="btn btn-primary">Xác nhận </button></a>
					</div>
				</div>
			</div>
	</div>
</div>
</body>
</html>