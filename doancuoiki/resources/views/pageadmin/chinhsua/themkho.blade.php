<!DOCTYPE html>
<html>
<head>
	@include('layouts.btrExtend')
</head>
<body>
<link rel="stylesheet" href="{{asset('css/style_pageadmin/style_themkho.css')}}">
	<form action="{{route('xulythemkho')}}" method="post">
	<div class="container">
	<div class="table-responsive">
	<table class="table">
	<h2 class="text-center">THÊM DỮ LIỆU VÀO KHO</h2>
	<tr>
			<td><label for="masp"> Mã sản phẩm:  </label></td>
			<td><input type="text" name="masp" required="required"></td>
	</tr>
	<tr>
			<td><label for="masp"> Hãng  </label></td>
			<td><input type="text" name="hang" required="required"></td>
	</tr>
	<tr>
			<td><label for="masp"> Đối tượng:  </label></td>
			<td><input type="radio" name="doituong" required="required" value="nam">   Nam </br>
			<input type="radio" name="doituong" required="required" value="nu" checked="checked">   Nữ</td>
	</tr>
	<tr>
			<td><label for="masp"> Loại sản phẩm </label></td>
			<td><input type="text" name="loaisp" required="required"></td>
	</tr>
	<tr>
		<td><label for="tensp"> Tên sản phầm: </label></td>
		<td><input type="text" name="tensp" required="required"> </td>
		</div>
	</tr>
	<tr>
		<td><label for="mausac"> Màu sắc: </label></td>
		<td><input type="text" name="mausac" required="required"> </td>
	</tr>
	<tr>
		<td><label for="giagoc">Giá gốc: </label></td>
		<td><input type="number" name="giagoc" required="required"></td>
	</tr>
	<tr>
		<td><label for="soluonghang">Số lượng hàng: </label></td>
		<td><input type="number" name="soluonghang" required="required"></td>
	</tr>
	<tr>
		<td><label for="size" required="required">Size: </label></td>
		<td><input type="number" name="size" required="required"></td> 
	</tr>
	<tr>
		<td></td> 
		<td colspan="2"><button type="submit" class="btn btn-success">Thêm dữ liệu</button></td>
		</div>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</tr>
	</table>
	</div>
	</div>
	</form>
</body>
</html>