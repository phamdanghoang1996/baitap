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
				<p style="font-size: 25px; font-weight: bold;">CHÍNH SÁCH BẢO HÀNH</p>
				</div>
		</div>
		<div class="panel-body">
			<img src="{{asset('img/baohanh/baohanh1.jpg')}}" alt="baohanh" class="img-responsive" style="margin-left: 20%">
			<div style="font-size: 18px">
				<h3 style="font-weight: bold">Điều kiện bảo hành: </h3>
				<p>- Có hóa đơn mua hàng ở Shop</p>
				<p>- Sản phẩm mua chưa quá 1 năm</p>
				<h3 style="font-weight: bold">Nội dung bảo hành: </h3>
				<p>- Bảo hành lỗi kỹ thuật của sản xuất: bung keo, hở chỉ...</p>
				<p>- Hỗ trợ</p>
				<p>(Nếu bảo hành không được các lỗi ký thuật từ nhà sản xuất, khách </p>
				<p>hàng sẽ được đổi mới sản phẩm thay thế)</p>
			</div>
			<img src="{{asset('img/baohanh/baohanh2.png')}}" alt="baohanh" class="img-responsive" style="margin-left: 20%">
			<div style="font-size: 18px; margin-left: 48%">
				<p style="font-size: 22px"><strong>ĐỊA ĐIỂM BẢO HÀNH</strong></p>
				<p><strong>Tất cả chi nhánh thuộc hệ thống SHOP</strong></p>
				<p>Thời gian bảo hành: Từ 3 - 7 ngày làm việc</p>
				<p>Nhân viên sẽ hỗ trợ và thông báo với khách hàng thời gian cụ thể</p>
				<p>phản hồ từ nhà sản xuất và hỗ trợ thông báo với khách hàng đến nhận </p>
				<p>sản phẩm khi hoàn thành</p>
			</div>
		</div>
			
		</div>
	</div>
	@include('layouts.footer')
</body>
</html>