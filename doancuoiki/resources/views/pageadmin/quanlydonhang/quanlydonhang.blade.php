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
		<h3 style="font-weight: bold">Quản lý đơn hàng</h3>
		<table class="table table-bordered" style="margin-top: 20px;margin-left:-100px">
			<tr class="info">
				<th class="text-center">ID</th>
				<th class="text-center">Tên khách hàng</th>
				<th class="text-center">Địa chỉ</th>
				<th class="text-center">Số điện thoại</th>
				<th class="text-center">Sản phẩm</th>
				<th class="text-center">Số lượng</th>
				<th class="text-center">Thành tiền</th>
				<th class="text-center">Ngày đặt hàng</th>
				<th class="text-center">Chức năng</th>
			</tr>
			@foreach($thongtin as $key)
			<tr id="{{$key->mahd}}">
				<td class="text-center">{{$key->mahd}}</td>
				<td class="text-center" width="200px">{{$key->tenkh}}</td>
				<td class="text-center" width="200px">{{$key->name_ward.', '.$key->name_district.', '.$key->name_province}}</td>
				<td class="text-center">{{$key->dienthoai}}</td>
				<td class="text-center">{{$key->masp}}</td>
				<td class="text-center">{{$key->soluong}}</td>
				<td class="text-center">{{number_format($key->tiensanpham)}}</td>
				<td class="text-center">{{$key->ngaybanhang}}</td>
				<td class="text-center" width="300px">
				<a href="http://localhost:8000/doancuoiki/public/index.php/pageadmin/quanly/quanlydonhang/suadonhang/{{$key->mahd}}" style="text-decoration: none; color:#FFF; font-weight: bold"><button class="btn btn-primary"> <span class="glyphicon glyphicon-pencil"> SỬA </span></button></a>
				<a href="http://localhost:8000/doancuoiki/public/index.php/pageadmin/quanly/quanlydonhang/xoadonhang/{{$key->mahd}}" style="text-decoration: none; color:#FFF; font-weight: bold"> <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"> XÓA </span></button></a>
				<a href="http://localhost:8000/doancuoiki/public/index.php/pageadmin/quanly/quanlydonhang/indonhang/{{$key->mahd}}" style="text-decoration: none; color:#FFF; font-weight: bold"> <button class="btn btn-info"> <span class="glyphicon glyphicon-print"> IN </span></button></a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>	
</body>
</html>