<!DOCTYPE html>
<html>
<head>
	@include('layouts.btrExtend')
	<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
	 <script src="{{asset('js/Highcharts/code/highcharts.js')}}"></script>
<script src="{{asset('js/Highcharts/code/modules/exporting.js')}}"></script>
</head>
<body>
<div class="row">
	<div class="col-md-4">
		@include('layouts.buttonMenuAdmin')
	</div>	
	<div class="col-md-8" style="margin-left:-30px;margin-top: 10px">
 			 <div class="col-md-3">
				<a href="{{url('pageadmin/quanly/quanlydonhang')}}"><img src="{{asset('img/icon/doanhthu.png')}}" alt="Responsive-img" width="100px"></a>
				<h4 style="font-weight: bold; font-size: 20px"><span></span></h4>
 			 </div>
 			 <div class="col-md-3">
				<a href="{{url('pageadmin/quanly/quanlydonhang')}}"><img src="{{asset('img/icon/dien.png')}}" alt="Responsive-img" width="100px"></a>
				<h4 style="font-weight: bold; font-size: 20px"><span> đồng</span></h4>
 			 </div>
 			 <div class="col-md-3">
 				<a href="{{url('pageadmin/quanly/quanlyphanhoikhachhang')}}""><img src="{{asset('img/icon/ship.png')}}" alt="Responsive-img" width="100px"></a>
				<h4 style="font-weight: bold; font-size: 20px"><span></span> đồng</h4>
 			 </div>
			 <div class="col-md-3">
				<a href="{{url('pageadmin/quanly/quanlyphanhoikhachhang')}}"><img src="{{asset('img/icon/other.png')}}" alt="Responsive-img" width="100px"></a>
				<h4 style="font-weight: bold; font-size: 20px"></h4>
			 </div>
	</div>
	<div class="col-md-8" style="margin-left:500px; margin-top: 60px;">
		<div class="col-md-6">
			@include('layouts.bieudo_thongketongdoanhso')
		</div>
		<div class="col-md-6">
			<h4>Top 5 khu vực có mức bán hàng cao nhất</h4>
		</div>
	</div>
	
</div>	
</body>
</html>