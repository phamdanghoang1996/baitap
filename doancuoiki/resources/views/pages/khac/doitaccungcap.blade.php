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
				<p style="font-size: 25px; font-weight: bold;">ĐỐI TÁC CUNG CẤP</p>
				</div>
		</div>
		<div class="panel-body">
		<div style="margin-left: 40px">
			<img src="{{asset('img/doitaccungcap/doitaccungcap.jpg')}}" alt="baohanh" class="img-responsive" style="margin-left: 30%;; margin-bottom: 100px">
			<h3 style="font-weight: bold">Cảm ơn các thương hiệu đã luôn đồng hành: </h3>
			<img src="{{asset('img/doitaccungcap/nike.jpg')}}" alt="baohanh" class="img-responsive" style="float: left">
			<img src="{{asset('img/doitaccungcap/adidas.png')}}" alt="baohanh" class="img-responsive" style="float: left; margin-left: 200px;">
			<img src="{{asset('img/doitaccungcap/bitis.jpg')}}" alt="baohanh" class="img-responsive" style="float:left; margin-left: 200px;">
			</div>
		</div>
		</div>
			
	</div>
	@include('layouts.footer')
</body>
</html>