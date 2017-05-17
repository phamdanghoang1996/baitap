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
				@if($thongbao==1)
					<h3><span style="font-size: 20px;
					font-weight: bold">Đã cập nhật thành công sản phẩm</span> </h3> 
				@else
					<h3><span style="font-size: 20px;
					font-weight: bold">{{$thongbao}}</span> </h3> 
				@endif
				</div>
				<div class="panel-footer">
					<div class="text-center">
					@if($thongbao==1)
						<button class="btn btn-primary"><a href="http://localhost:8000/doancuoiki/public/index.php/pageadmin/chinhsua/thongtinsanpham" style="color:#FFF; text-decoration: none">Xác nhận </a></button>
					@else
						<button class="btn btn-primary"><a href="http://localhost:8000/doancuoiki/public/index.php/pageadmin/chinhsua/	thongtinsanpham/capnhatsanpham/{{$masp}}" style="color:#FFF; text-decoration: none">Xác nhận </a></button>
					@endif
					</div>
				</div>
			</div>
	</div>
</div>
</body>
</html>