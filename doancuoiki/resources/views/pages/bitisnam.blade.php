<!DOCTYPE html>
<html>
<head>
	@include('layouts.btrExtend')
</head>
<body>
	@include('layouts.ad');
	@include('layouts.buttonMenu')
	@include('layouts.timkiem')
	<link rel="stylesheet" href="{{asset('css/style_content.css')}}">
	<link rel="stylesheet" href="{{asset('css/style_pages/style_bansanpham.css')}}">
	<div class="container">
	<h2>Giày Bitis Nam: </h2>
	<div class="col-md-2">
		
	</div>
		<div class="col-md-10">
		@foreach($binam as $key)
			<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="sanpham">
					<a href="http://localhost:8000/doancuoiki/public/index.php/page/trangchinh/bitisnam/{{$key->masp}}">
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