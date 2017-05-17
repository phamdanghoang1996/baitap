<!DOCTYPE html>
<html>
<head>
	@include('layouts.btrExtend')
</head>
<body>
@include('layouts.buttonMenu')
<script>
</script>
<link rel="stylesheet" href="{{asset('css/style_pages/style_thongtinkhachhang.css')}}">
	<div class="container">
		<h3 style="font-weight: bold">THÔNG TIN GIỎ HÀNG: </h3>
		@if(isset($content))
		<table class="table table-bordered">
			<tr class="info">
				<th></th>
				<th class="text-center" style="font-size: 18px">Mã sản phẩm</th>
				<th class="text-center" style="font-size: 18px">Tên sản phẩm</th>
				<th class="text-center" style="font-size: 18px">Giá bán</th>
				<th class="text-center" style="font-size: 18px">Số lượng</th>
				<th class="text-center" style="font-size: 18px">Thành tiền</th>
				<th></th>
			</tr>
			@foreach($content as $item)
			<tr>
				<td><img src="{{$item->options->img}}" alt="hinhsanpham" class="img-responsive"></td>
				<td class="text-center" style="font-size: 16px">{{$item->id}}</td>
				<td class="text-center" style="font-size: 16px">{{$item->name}}</td>
				<td class="text-center" style="font-size: 16px">{{number_format($item->price)}} VNĐ</td>
				<td class="text-center" style="font-size: 16px">{{$item->qty}}</td>
				<td class="text-right" style="font-size: 16px">{{number_format($item->price*$item->qty)}}</td>
				<td>
					<a href="http://localhost:8000/doancuoiki/public/index.php/page/trangchinh/giohang/xoagiohang/{{$item->rowId}}"><button type="button" class="btn btn-danger" aria-label="Left Align">
 						 <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						Xóa sản phẩm</button>
				</td>
			</tr>
			@endforeach
			<tr>
				<td style="font-size: 20px; font-weight: bold" colspan="6" class="text-center">TỔNG CỘNG: </td>
				<td style="font-size: 18px; color: red" class="text-right">{{$total}} VNĐ</td>
			</tr>
		</table>
		@else 
			<h4>Giỏ hàng trống</h4>
		@endif
	</div>
	@include('layouts.footer')
</body>
</html>