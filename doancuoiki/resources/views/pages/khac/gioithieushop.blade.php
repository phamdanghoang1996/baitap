<!DOCTYPE html>
<html>
<head>
	@include('layouts.btrExtend')
	<link rel="stylesheet" href="{{asset('css/style_pages/style_bansanpham.css')}}">
</head>
<body>
	@include('layouts.buttonMenu')
	<div class="container" style="margin-bottom: 20px">
		<h3 style="font-weight: bold">Giới thiệu SHOP: </h3>
		<div class="panel-default" style="border: 5px solid #CECBC6; border-radius: 15px 50px">
			<div id="gioithieu1" style="font-size: 16px; margin-left: 20px; margin-top: 20px">
			<p>Chúng tôi chuyên kinh doanh sác mặt hàng về giày là cầu</p>
			<p>giúp các bán trẻ trong nước tiếp cận các thu hướng giày</p>
			<p>mới nhất. Không dừng lại ở đó. Với tiêu chí "Chất Lượng</p>
			<p>Đặt lên hàng đầu" chúng tôi không ngừng cài tiến, rút ngắn</p>
			<p>khoảng cách của Shop với khách hàng</p>
			</div>
			<img src="{{asset('img/gioithieu/gioithieu1.jpg')}}" alt="" style="border-radius: 15px 50px 30px 5px; margin-left: 10%" width="70%" class="img-responsive">
			<div id="gioithieu2" style="font-size: 16px; margin-left:70%; margin-top: 20px">
			<p>Thành lập hơn 5 năm hệ thống của hàng</p>
			<p>Thời trang khắp <strong>TPHCM, Biên Hòa, Cần Thơ,</strong></p>
			<p><strong>Long Xuyên, Rạch Giá </strong>. Sản phẩm đa dạng</p>
			<p>, hiện đại trẻ trung là năng động</p>
			</div>
			<img src="{{asset('img/gioithieu/gioithieu2.jpg')}}" alt="" style="border-radius: 15px 50px 30px 5px; margin-left: 6%" width="70%" class="img-responsive">
		</div>
	</div>
	@include('layouts.footer')
</body>
</html>