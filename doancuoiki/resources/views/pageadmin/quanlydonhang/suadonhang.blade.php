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
	<h3 style="font-weight: bold">SỬA ĐƠN HÀNG</h3>
			@foreach($thongtin as $key)
				<form action="madh={{$key->mahd}}" method="post" class="form-group" style="margin-left: -100px">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" value="{{$key->mahd}}" name="mahd">
					<label for="">Số lượng</label>
					<input type="numer" name="soluong" class="form-control" style="width: 70%">
					<label for="">Trang thái đơn hàng</label>
					<select name="trangthai" class="form-control" style="width: 70%">
						<option value="">----Chọn trạng thái----</option>
						<option value="Thành công">Thành công</option>
						<option value="Đang chờ">Chờ</option>
					</select>

					<button type="submit" class="btn btn-success" style="margin-top: 10px;">SỬA</button>
				</form>
			@endforeach
	</div>
</div>
</body>
</html>