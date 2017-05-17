<!DOCTYPE html>
<html>
<head>
@include('layouts.btrExtend')
<link rel="stylesheet" href="{{asset('css/style_pages/style_bansanpham.css')}}">
</head>
<body>
@include('layouts.buttonMenu')
@include('layouts.ad')
@include('layouts.timkiem')
<link rel="stylesheet" href="{{asset('css/style_content.css')}}">
<div class="container">
<h2>Giày ADIDAS Nữ: </h2>
<div class="col-md-2">
	
</div>
<div class="col-md-10">
@foreach($adnu as $key)
			<div class="col-md-4">
					<div class="sanpham">
					<a href="http://localhost:8000/doancuoiki/public/index.php/page/trangchinh/adidasnu/{{$key->masp}}">
						<div class="image">
  							<img src="{{$key->urlhinh}}" class="img-responsive">
  						</div>
 						<div class="middle">
    							<div class="text">Mua ngay</div>
 						</div>
 					</a>
 						<p class="text-center" style="font-size: 18px">{{$key->tensp}}</p>
						<p class="text-center" style="font-size: 16px; color: red">{{number_format($key->giaban)}} VND </p>
					</div>
			</div>
@endforeach
</div>
</div>
@include('layouts.footer')
</body>
</html>