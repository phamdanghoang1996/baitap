<div class="text-center">
<div class="col-md-12">
	<form action="{{route('timkiemsp')}}" method="post"> 
		<input type="text" name="tensp" style="width: 600px; height: 40px; font-size: 16px" placeholder="Tìm kiếm sản phẩm, thương hiệu mong muốn...">
		<button type="submit" style="width: 100px; height: 40px; font-weight: bold; ">TÌM KIẾM</button>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
</div>
</div>