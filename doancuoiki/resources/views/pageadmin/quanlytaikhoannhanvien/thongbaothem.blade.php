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
	@if($count==0)
			<div class="panel panel-default" style="margin-left: -100px; width: 60%">
				<div class="panel-body" >
					<h4 style="font-weight: bold">Đã thêm nhân viên với thông tin </h4>
					<p style="font-weight: bold">Mã số nhân viên: </p><span>{{$thongtin->msnv}}</span> 
					<p style="font-weight: bold">Họ và tên: </p> <span> {{$thongtin->hoten}}</span>
					<p style="font-weight: bold">Địa chỉ: </p><span>{{$thongtin->diachi}}</span>
					<p style="font-weight: bold">Điện thoại: </p>{{$thongtin->dienthoai}} </span>
					<p style="font-weight: bold">Chức vụ: </p> <span>{{$thongtin->chucvu}}</span>
					<p style="font-weight: bold">Lương: </p><span>{{$thongtin->luong}}</span>
				</div>
				<div class="panel-footer">
					<div class="text-center">
					<button class="btn btn-primary"><a href="http://localhost:8000/doancuoiki/public/index.php/pageadmin/quanly/quanlytaikhoannhanvien" style="color:#FFF; text-decoration: none">Xác nhận </a></button>
					</div>
				</div>
			</div>
	@else
			<h3>Đã bị trùng mã số nhân viên</h3>
	@endif
	</div>
</div>
</body>
</html>