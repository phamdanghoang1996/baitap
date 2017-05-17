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
		<h3 style="font-weight: bold">Thông tin sản phẩm hiện có: </h3>
		<table class="table table-bordered" style="margin-top: 20px;margin-left:-100px">
			<tr class="info">
				<th width="100px" class="text-center">Mã sản phẩm</th>
				<th width="250px" class="text-center">Loại sản phẩm</th>
				<th width="200px" class="text-center">Tên sản phẩm</th>
				<th width="100px" class="text-center">Màu sắc</th>
				<th class="text-center">Giá gốc</th>
				<th width="70px" class="text-center">Số lượng hàng</th>
				<th class="text-center">Size</th>
				<th class="text-center">Hãng</th>
				<th class="text-center">Đối tượng</th>
				<th width="300px" class="text-center">Ngày nhập kho</th>
				<th width="400px" class="text-center">Chức năng</th>
			</tr>
			@foreach($thongtin as $key)
			<tr>
				<td class="text-center">{{$key->masp}}</td>
				<td class="text-center">{{$key->loaisp}}</td>
				<td class="text-center">{{$key->tensp}}</td>
				<td class="text-center">{{$key->mausac}}</td>
				<td class="text-center">{{number_format($key->giagoc)}}</td>
				<td class="text-center">{{$key->soluonghang}}</td>
				<td class="text-center">{{$key->size}}</td>
				<td class="text-center">{{$key->hang}}</td>
				<td class="text-center">{{$key->doituong}} </td>
				<td class="text-center">{{$key->ngaynhapkho}}</td>				
				<td class="text-center" width="500px">
				<a href="http://localhost:8000/doancuoiki/public/index.php/pageadmin/chinhsua/thongtinsanpham/capnhatsanpham/{{$key->masp}}" style="text-decoration: none; color:#FFF; font-weight: bold"><button class="btn btn-primary" <span class="glyphicon glyphicon-pencil"> SỬA </span></button> </a>
				<a href="http://localhost:8000/doancuoiki/public/index.php/pageadmin/chinhsua/thongtinsanpham/xoasanpham/{{$key->masp}}" style="text-decoration: none; color:#FFF; font-weight: bold;"><button class="btn btn-danger" style="margin-top:10px"> <span class="glyphicon glyphicon-trash"> XÓA </span></button></a>
				</td>
			</tr>
			@endforeach
		</table>
		<div style="margin-left:200px">{!! $thongtin->links()!!}</div>
	</div>
</div>	
</body>
</html>