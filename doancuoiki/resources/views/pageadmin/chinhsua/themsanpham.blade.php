<!DOCTYPE html>
<html>
<head>
	@include('layouts.btrExtend')
	<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
</head>
<body>
<div class="row">
	<div class="col-md-4">
		@include('layouts.buttonMenuAdmin')
	</div>	
	<div class="col-md-8">
		<h3>Thêm sản phẩm</h3>
		<form action="{{route('themsanpham')}}" method="post" class="fom-group" style="margin-left: 0px" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
<label for="">Mã sản phẩm</label>
<input type="text" name="masp" class="form-control" style="width: 40%"  required="required">	
<label for="">Loại sản phẩm</label>
<br>
<select name="loaisanpham" style="width: 40%" required="required">
	<option value="giay">Giày</option>
	<option value="non">Nón</option>
</select>
<br>
<label for="">Tên sản phẩm</label>
<input type="text" name="tensanpham" class="form-control" style="width: 40%"  required="required">
<label for="">Màu sắc</label>
<input type="color" name="mausac" class="form-control" style="width: 40%"  required="required">
<label for="">Giá gốc</label>
<input type="number" name="giagoc" class="form-control" style="width: 40%"  required="required">		
<label for="">Số lượng hàng</label>
<input type="number" name="soluong" class="form-control" style="width: 40%"  required="required">
<label for="">Size</label>
<br>
<select name="size" style="width: 40%" required="required">
	<option value="36">36</option>
	<option value="37">37</option>
	<option value="38">38</option>
	<option value="39">38</option>
	<option value="40">40</option>
	<option value="41">41</option>
	<option value="42">42</option>
	<option value="43">43</option>
</select>
<br>
<label for="">Hãng</label>
<br>
<select name="hang" style="width: 40%" required="required">
	<option value="nike">Nike</option>		 
	<option value="adidas">Adidas</option>	 
	<option value="bitis">Bitis</option>	 	 
</select>
<br>
<label for="">Đối tượng</label>
<br>
<select name="doituong" style="width: 40%" required="required">
	<option value="nam">Nam</option>		 
	<option value="nu">Nữ</option>	 	 
</select>
<br> 
<label for="">Hình ảnh sản phẩm: </label>
<input type="file" name="hinhanh" class="form-control" style="width: 40%" required="required">
<label for="">Giá bán</label>
<input type="number" name="giaban" class="form-control" style="width: 40%" required="required">
<label for="">Mô tả sản phẩm: </label>
<br>
<textarea name="mota" cols="56" rows="10" name="mota">
	

</textarea>
<br>
<button type="submit" class="btn btn-success" style="margin-top: 10px;">Thêm sản phẩm</button>
</form>
	</div>
</div>	
</body>
</html>