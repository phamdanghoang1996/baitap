<!DOCTYPE html>
<html>
<head>
@include('layouts.btrExtend')
</head>
<style>
<body>{font-family: DejaVu Sans, sans-serif;}
</style>
<div class="row">
@foreach($thongtin as $key)
<div class="col-md-4" style="margin-left: 40px">
	<h4 style="font-weight: bold; font-size: 25px; font-family: DejaVu Sans, sans-serif;">HÓA ĐƠN</h4>
	<p><span style="font-weight: bold; font-family: DejaVu Sans, sans-serif;">Mã số hóa đơn:  </span>{{$key->mahd}}</p>
	<p><span style="font-weight: bold; font-family: DejaVu Sans, sans-serif;">Họ tên khách hàng: </span>{{$key->tenkh}}</p>
	<p><span style="font-weight: bold; font-family: DejaVu Sans, sans-serif;">Địa chỉ: </span>{{$key->name_ward.', '.$key->name_district.', '.$key->name_province}}</p>
	<p><span style="font-weight: bold; font-family: DejaVu Sans, sans-serif;">Số điện thoại: </span>{{$key->dienthoai}}</p>
	<p><span style="font-weight: bold; font-family: DejaVu Sans, sans-serif;">Mã sản phẩm:  </span>{{$key->masp}}</p>
	<p><span style="font-weight: bold; font-family: DejaVu Sans, sans-serif;">Ngày đặt hàng: </span>{{$key->ngaybanhang}}</p>
	<p><span style="font-weight: bold; font-family: DejaVu Sans, sans-serif;">Số lượng: </span>{{$key->soluong}}</p>
	<p><span style="font-weight: bold; font-family: DejaVu Sans, sans-serif;">Thành tiền: </span>{{$key->tiensanpham+$key->phiship}}</p>
	<p><span style="font-weight: bold; font-family: DejaVu Sans, sans-serif;">Ngày xuất hóa đơn: </span>{{$ngayxuathoadon}}</p>
	<p style="margin-left: 100px; font-weight: bold; font-family: DejaVu Sans, sans-serif;">Người xuất hóa đơn: </p>
	<p style="margin-left:110px; font-weight: bold; margin-top: 100px; font-family: DejaVu Sans, sans-serif;">Pham Dang Hoang</p>
</div>
@endforeach
</div>
</body>
</html>