<!DOCTYPE html>
<html>
<head>
  @include('layouts.btrExtend')
 <script src="{{asset('js/Highcharts/code/highcharts.js')}}"></script>
<script src="{{asset('js/Highcharts/code/modules/exporting.js')}}"></script>
</head>
<body>
<script type="text/javascript">
	$(document).ready(function(){
		$('#hang').change(function(){
			var hang = $(this).val();
			var link = 'http://localhost:8000/doancuoiki/public/index.php/pageadmin/trangchinh/hang_hoho='+hang;
			$.get(link,function(data1){
				$("#tensanpham").html(data1);
			});
		});
		$('#tensanpham').change(function(){
			var masp =$(this).val();
			var link = 'http://localhost:8000/doancuoiki/public/index.php/pageadmin/trangchinh/hang_hehe@masp='+masp;
			$.get(link,function(data2){
				$(".panel-body").html(data2);
			});
		});
	});
</script>
<div class="row">
	<div class="col-md-4">
  @include('layouts.buttonMenuAdmin')
 	 </div>
 	 <div class="col-md-8" style="margin-left:500px; margin-top: 20px;">
 	 <h4 style="font-weight: bold">Hôm nay ngày: {{$ngayhomnay}} </h4>
 			 <div class="col-md-3">
				<a href="{{url('pageadmin/quanly/quanlydonhang')}}"><img src="{{asset('img/icon/donhang.png')}}" alt="Responsive-img" width="100px"></a>
				<h4 style="font-weight: bold; font-size: 20px"><span>{{$count_donhang}} đơn hàng</span></h4>
 			 </div>
 			 <div class="col-md-3">
				<a href="{{url('pageadmin/quanly/quanlydonhang')}}"><img src="{{asset('img/icon/money.png')}}" alt="Responsive-img" width="100px"></a>
				<h4 style="font-weight: bold; font-size: 20px"><span>{{number_format($doanhthu)}} đồng</span></h4>
 			 </div>
 			 <div class="col-md-3">
 				<a href="{{url('pageadmin/quanly/quanlyphanhoikhachhang')}}""><img src="{{asset('img/icon/phanhoi.png')}}" alt="Responsive-img" width="100px"></a>
				<h4 style="font-weight: bold; font-size: 20px"><span>{{$count_phanhoi}}</span> phản hồi</h4>
 			 </div>
			 <div class="col-md-3">
				<a href="{{url('pageadmin/quanly/quanlyphanhoikhachhang')}}"><img src="{{asset('img/icon/thongke.png')}}" alt="Responsive-img" width="100px"></a>
				<h4 style="font-weight: bold; font-size: 20px"></h4>
			 </div>
	</div>
	<div class="col-md-8" style="margin-left:500px; margin-top: 60px;">
		<div class="col-md-6">
			<h4>Thống kê doanh thu từng sản phẩm theo tháng</h4>
			<div class="panel-default" style="margin-left:-200px">
				<div class="panel-heading">
					<select name="hang" id="hang" class="form-control" style="width: 50%">
						@foreach($hang as $key)
							<option value="{{$key->hang}}">{{$key->hang}}</option>
						@endforeach
					</select>
					<select name="tensanpham" id="tensanpham" class="form-control" style="width: 50%; margin-top: 10px">
						
					</select>
				</div>
				<div class="panel-body">
					
				</div>
			</div>
		</div>
		<div class="col-md-6">
			@include('layouts.bieudo_sanphambanchay')
		</div>
	</div>





 </div>
</body>
</html>