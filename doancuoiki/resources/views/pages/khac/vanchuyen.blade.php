<!DOCTYPE html>
<html>
<head>
	@include('layouts.btrExtend')
	<link rel="stylesheet" href="{{asset('css/style_pages/style_bansanpham.css')}}">
</head>
<body>
	@include('layouts.buttonMenu')
	<div class="container" style="margin-bottom: 20px">
		<div class="panel-default" style="border: 5px solid #CECBC6; border-radius: 15px 50px">
		<div class="panel-heading">
				<div class="text-center">
				<p style="font-size: 25px; font-weight: bold;">THÔNG TIN VẬN CHUYỂN</p>
				</div>
		</div>
		<div class="panel-body">
			<img src="{{asset('img/vanchuyen/quytrinh.png')}}" alt="baohanh" class="img-responsive center-block">
			<h2 style="font-weight: bold;">Phí vận chuyên theo mức phí sau: </h2>
			<img src="{{asset('img/vanchuyen/phivanchuyen.jpg')}}" alt="baohanh" class="img-responsive center-block">
			</div>
		</div>
			
	</div>
	@include('layouts.footer')
</body>
</html>