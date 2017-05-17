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
		<form action="{{route('phanhoikhachhhang')}}" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<h3 style="font-weight: bold">LỊCH SỬ BÀI VIẾT </h3>
			<table class="table table-bordered" style="margin-top: 20px;margin-left:-100px">
				<tr class="info">
					<th class="text-center">Mã số bài viết</th>
					<th class="text-center">Tiêu đề bài viết</th>
					<th class="text-center">Người viết</th>
					<th class="text-center">Thời gian viên</th>
					<th class="text-center">Chức năng</th>
				</tr>
				@foreach($thongtin as $key)
				<tr>
					<td class="text-center">{{$key->mabaiviet}}</td>
					<td class="text-center">{{$key->tieude}}</td>
					<td class="text-center">{{$key->manhanvien}}</td>
					<td class="text-center">{{$key->ngayvietbai}}</td>
					<td class="text-center"> 
						<a href="http://localhost:8000/doancuoiki/public/index.php/pageadmin/quanly/quanlybaiviet/lichsubaiviet"><button>Xóa bài viết</button></a>
						<a href="{{url('pageadmin/quanly/quanlybaiviet/lichsubaiviet/chinhsua/mabaiviet=$key->mabaiviet')}}"><button class="btn btn-primary">Chỉnh sửa </button></a>
					</td>
				</tr>
				@endforeach
				</table>
		</form>
		</div>
	</div>
</body>
</html>