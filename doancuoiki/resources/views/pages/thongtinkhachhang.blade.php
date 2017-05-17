<!DOCTYPE html>
<html>
<head>
	@include('layouts.btrExtend')
</head>
<body>
@include('layouts.buttonMenu')
<script>
	$(document).ready(function(){
		$("#provinceid").change(function(){
			var id_tinh = $(this).val();
			var link_tinh = 'http://localhost:8000/doancuoiki/public/index.php/page/thongtinkhachhang/'+id_tinh;
			var link_phi = 'http://localhost:8000/doancuoiki/public/index.php/page/thongtinkhachhang/phiship/'+id_tinh;
			$.get(link_tinh,function(data){
				$("#districtid").html(data);
			});	
			$.get(link_phi,function(data){
				$("#phiship").html(data);
				var thanhtien = parseInt($("#tiensanpham").attr("value"))+parseInt($("#phiship").html());
				$("#thanhtien").text()=String(thanhtien);
			});
		});
		$("#districtid").change(function(){
			var id_huyen = $(this).val();
			var link_huyen = 'http://localhost:8000/doancuoiki/public/index.php/page/thongtinkhachhang/huyen/'+id_huyen;
			$.get(link_huyen,function(data){
				$("#wardid").html(data);
			}); 
		});
	});
</script>
<link rel="stylesheet" href="{{asset('css/style_pages/style_thongtinkhachhang.css')}}">
	<div class="container">
	<form action="{{route('ghinhanthongtin')}}" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="col-md-6">
		<h4>Thông tin người mua/nhận hàng</h4>
	<table class="table">
		<tr>
			<td><label for="tenkh"> Tên:  </label></td>
			<td><input type="text" name="tenkh" required="required" placeholder="Tên người nhận" style="width: 300px"></td>
		</tr>
			<tr>
			<td><label for="gioitinh"> Đối tượng:  </label></td>
			<td><input type="radio" name="gioitinh" required="required" value="nam">   Nam </br>
			<input type="radio" name="gioitinh" required="required" value="nu" checked="checked">   Nữ</td>
		</tr>
	
		<tr>
			<td><label for="">Tỉnh/Thành phố</label></td>
			<td>
			<select name="provinceid" id="provinceid" style="width: 300px">
				@foreach($tinh as $key)
					<option value="{{$key->provinceid}}">{{$key->name_province}}</option>
				@endforeach
			</select>
			</td>
		</tr>
		<tr>
			<td><label for="">Quận/Huyện</td>
			<td>
			<select name="districtid" id="districtid" style="width: 300px"></select>
			</td>
		</tr>
		<tr>
			<td><label for="">Phường/Xã/Thị Trấn</td>
			<td>
			<select name="wardid" id="wardid" style="width: 300px"></select>
			</td>
		</tr>
		<td><label for="email"> Email:  </label></td>
		<td><input type="text" name="email" required="required" placeholder="Email" style="width: 300px"> </td>
		</div>
		</tr>
		<tr>
		<td><label for="dienthoai"> Điện thoại: </label></td>
		<td><input type="text" name="dienthoai" required="required" placeholder="Điện thoại người nhận hàng" style="width: 300px"> </td>
		</tr>
		<input type="hidden" name="soluongdat" value="{{$thongtinsp->soluong}}">
		<input type="hidden" name="masp" value="{{$thongtinsp->masp}}">
	</table>
		</div>
		<div class="col-md-6">
			<h4>Chi tiết sản phẩm trong giỏ hàng</h4>
			<div class="col-md-5">
				<img src="{{$thongtinsp->urlhinh}}" class="img-responsive" alt="Responsive image">
			</div>
			<div class="col-md-7">
				<p><span style="font-weight:bold"> Tên </span>: {{$thongtinsp->tensp}}</p>
				<p><span style="font-weight:bold"> Size </span>: {{$thongtinsp->size}}</p>
				<p><span style="font-weight:bold"> Màu </span>: {{$thongtinsp->mau}}</p>
				<p style="font-weight:bold">Phí Ship: <span id="phiship"> </span> VNĐ</p>
				<p style="font-weight:bold">Tiền sản phẩm:  <span id="tiensanpham" value="{{$thongtinsp->giaban*$thongtinsp->soluong}}">{{number_format($thongtinsp->giaban*$thongtinsp->soluong)}}</span> VNĐ</p>
				<p style="font-weight:bold; font-size: 18px">TỔNG CỘNG: <span id="thanhtien"> </span></p>
				<input type="hidden" name="soluong" value="{{$thongtinsp->soluong}}">
				<input type="hidden" name="tiensanpham" value="{{$thongtinsp->giaban*$thongtinsp->soluong}}">
				<div class="text-center">
				<button type="submit" class="btn btn-primary" style="width: 400px">ĐẶT HÀNG</button>
				</div>
			</div>
		</div>
	</form>
	</div>
	@include('layouts.footer')
</body>
</html>