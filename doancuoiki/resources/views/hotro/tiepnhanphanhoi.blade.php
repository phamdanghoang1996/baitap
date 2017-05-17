<!DOCTYPE html>
<html>
<head>
	@include('layouts.btrExtend')
</head>
<body>
	@include('layouts.buttonMenu')
	<div class="container" style="margin-top: 100px;margin-bottom: 100px">
		<div class="col-md-4">
			<img src="{{asset('img/icon/thankyou.jpg')}}" alt="" class="img-responsive">
		</div>
		<div class="col-md-8">
			<h2 style="color:#4285F4; font-weight: bold">Đã tiếp nhận thư thành công!</h2>
			<p style="font-size: 20px">Chúng tôi sẽ phản hồi cho <span  style="font-size: 20px;color:red;font-weight: bold">{{$thongtin->hoten}}</span> trong thời gian sớm nhất!</p>
			<p style="font-size: 20px">Vui lòng theo dõi email <span style="font-size: 20px;color:red;font-weight: bold">{{$thongtin->email}}</span> để nhận thông tin</p>
			<p style="font-size: 20px;font-weight: bold">Xin chân thành cảm ơn!</p>
		</div>
	</div>
	@include('layouts.footer')
</body>
</html>
