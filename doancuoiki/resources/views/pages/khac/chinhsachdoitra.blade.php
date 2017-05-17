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
				<p style="font-size: 25px; font-weight: bold;">CHÍNH SÁCH ĐỔI TRẢ</p>
				</div>
		</div>
		<div class="panel-body">
		<div class="text-center">
			<img src="{{asset('img/doitra/doitra1.jpg')}}" alt="baohanh" class="img-responsive center-block">
			<img src="{{asset('img/doitra/dieukien.jpg')}}" alt="baohanh" class="img-responsive" style="margin-top: 20px">
			<img src="{{asset('img/doitra/cachthuc.jpg')}}" alt="baohanh" class="img-responsive" style="margin-top: 20px">
			<img src="{{asset('img/doitra/luuy.jpg')}}" alt="baohanh" class="img-responsive" style="margin-top: 20px">
			</div>
		</div>
			
	</div>
	</div>
	@include('layouts.footer')
</body>
</html>