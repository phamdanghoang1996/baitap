<!DOCTYPE html>
<html>
<head>
	@include('layouts.btrExtend')
</head>
<body>
	@include('layouts.buttonMenu')
<div class="container" style="margin-bottom: 20px">
	<div class="col-md-12">
	<p style="font-size: 19px; font-weight: bold"> Chúng tôi đã ghi nhận đơn hàng của <span style="color:red; font-weight: bold">{{$khachhang->tenkh}}</span> </p>
	<p style="font-size: 19px; font-weight: bold"> Vui lòng theo dõi Email:  <span style="color: red; font-weight:bold;">{{$khachhang->email}}</span> để biết thông tin đơn hàng của mình</p>
	<p style="font-size: 19px; font-weight: bold"> Chúc một ngày tốt lành!</p>
	</div>
	<div class="col-md-12">
	<img src="{{asset('img/thankyou.jpg')}}" alt="Responsive" class="img-responsive">
	</div>
</div>
	@include('layouts.footer')
</body>
</html>

	
	