<!DOCTYPE html>
<html>
<head>
	@include('layouts.btrExtend')
</head>
<body>
	<div class="row">
		<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
		<div class="col-md-4">
			@include('layouts.buttonMenuAdmin')
		</div>
		<div class="col-md-8">
			<h3 style="font-weight: bold">Quản lý phản hồi khách hàng: </h3>
			<table class="table table-bordered" style="margin-top: 20px;margin-left:-100px">
				<tr class="info">
					<th>Chọn</th>
					<th class="text-center">Mã số phản hồi</th>
					<th class="text-center">Họ tên</th>
					<th class="text-center">Email</th>
					<th class="text-center">Số điện thoại</th>
					<th class="text-center">Nội dung</th>
					<th class="text-center">Ngày gửi</th>
					<th class="text-center">Trạng thái</th>
					<th class="text-center">Chức năng</th>
				</tr>
				@foreach($thongtin as $key)
				<tr>
					<td class="text-center">
						<input type="checkbox" name="msph" value="{{$key->maph}}">
					</td>
					<td class="text-center">{{$key->maph}}</td>
					<td class="text-center">{{$key->hoten}}</td>
					<td class="text-center">{{$key->email}}</td>
					<td class="text-center">{{$key->sodienthoai}}</td>
					<td class="text-center">{{$key->thuphanhoi}}</td>
					<td class="text-center">{{$key->ngayguiphanhoi}}</td>
					<td class="text-center">{{$key->trangthai}}</td>
					<td style="width: 200px">
						<a href="http://localhost:8000/doancuoiki/public/index.php/pageadmin/quanly/quanlyphanhoikhachhang/traloiphanhoi/maphanhoi={{$key->maph}}"><button class="btn btn-primary">Trả lời</button></a>
						<a href="http://localhost:8000/doancuoiki/public/index.php/pageadmin/quanly/quanlyphanhoikhachhang/xoaphanhoi/maphanhoi={{$key->maph}}"><button class="btn btn-danger">Xóa phản hồi</button></a>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</body>
</html>