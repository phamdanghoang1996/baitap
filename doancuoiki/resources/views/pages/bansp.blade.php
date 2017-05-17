<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="{{asset('css/multizoom.css')}}" type="text/css" />
@include('layouts.btrExtend')
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('js/multizoom.js')}}"></script>
<script type="text/javascript">
jQuery(document).ready(function($){
	$('#image1').addimagezoom({ 
		zoomrange: [2, 10],
		magnifiersize: [300,300],
		magnifierpos: 'right',
		cursorshade: true,
	})	
	$('#multizoom1').addimagezoom({ 
		descArea: '#description', 
		speed: 1500, 
		descpos: true, 
		imagevertcenter: true, 
		magvertcenter: true, 
		zoomrange: [3, 10],
		magnifiersize: [300,300],
		magnifierpos: 'right',
		cursorshade: true 
	});
	$('#multizoom2').addimagezoom({ 
		descArea: '#description2', 
		disablewheel: true 
	});	
})
</script>
</head>
<body>
@include('layouts.buttonMenu')
@include('layouts.ad')
<div class="container">
@foreach($bansp as $key)
	<div class="col-md-5">
		<img id="image1" border="0" src="{{$key->urlhinh}}" style="width:250px; height:338px">
	</div>
	<div class="col-md-5">
		<p style="font-size: 25px"> {{$key->tensp}} </p> 
		<p>Giá bán: <span style="font-size: 16px; color: red">{{number_format($key->giaban)}} VND </span></p>

		<p style="font-size: 16px"> Còn lại: {{$key->soluonghang}}</p>
	</div>
	<div class="col-md-2">
		<form action="{{route('thongtinkhachhang')}}" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" value="{{$key->giaban}}" name="giaban">
			<select style="width: 180px; height: 40px" name="mau"> 
				<option value="Bạn chưa chọn màu">Chọn màu</option>
				<option value="Đỏ">Đỏ</option>
				<option value="Đen">Đen</option>
				<option value="Xanh">Xanh</option>
			</select>
			<br>
			<select name="size" style="width: 180px; height: 40px; margin-top: 20px" required="required">
				<option value="Bạn chưa chọn size">Chọn size</option>
				<option value="{{$key->size}}">{{$key->size}}</option>
			</select>
			<p style="font-size: 18px; margin-top: 20px">Số lượng: </p>
			<input type="number" name="soluong" style="width: 180px; height: 40px" required="required">
			<button type="submit" class="btn btn-primary" style="margin-top: 20px; width: 180px"><span class="glyphicon glyphicon-plus-sign"></span> Mua ngay</button>
			<input type="hidden" name="masp" value="{{$key->masp}}">
			<input type="hidden" name='tensp' value="{{$key->tensp}}">
			<input type="hidden" name='urlhinh' value="{{$key->urlhinh}}">
		</form>
			<a href="http://localhost:8000/doancuoiki/public/index.php/page/trangchinh/muahang/{{$key->masp}}"><button style="margin-top: 20px; width: 180px" class="btn btn-danger"><span class="glyphicon glyphicon-shopping-cart"></span>Thêm vào giỏ hàng</button></a>
	</div>
	<div class="col-md-12">
		<h3 style="font-weight: bold">Mô tả sản phẩm: </h3>
		<div style="margin-left: 100px">{!!$key->motasp!!}</div>
	</div>
@endforeach

</div>
	<div class="container">
		<div class="col-md-12">
			<h3 style="font-weight: bold;">Sản phẩm liên quan: </h3>




		</div>
	</div>
	@include('layouts.footer')
</body>
</html>