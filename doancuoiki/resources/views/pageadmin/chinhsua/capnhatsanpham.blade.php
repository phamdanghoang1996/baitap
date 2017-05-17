<!DOCTYPE html>
<html>
<head>
	@include('layouts.btrExtend')
	<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
</head>
<body>
<div class="row">
	<div class="col-md-4">
		@include('layouts.buttonMenuAdmin')
	</div>	
	<div class="col-md-8">
		<h3>Sửa sản phẩm</h3>
		@foreach($thongtin as $key)
		<form action="{{$key->masp}}" method="post" class="fom-group" style="margin-left: 0px" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
<label for="">Mã sản phẩm</label>
<input type="text" name="masp" class="form-control" style="width: 40%"  value="{{$key->masp}}">	
<label for="">Loại sản phẩm</label>
<br>
<select name="loaisanpham" style="width: 40%" required="required">
	<option value="giay">Giày</option>
	<option value="non">Nón</option>
</select>
<br>
<label for="">Tên sản phẩm</label>
<input type="text" name="tensanpham" class="form-control" style="width: 40%"  required="required" placeholder="{{$key->tensp}}">
<label for="">Màu sắc</label>
<input type="color" name="mausac" class="form-control" style="width: 40%"  required="required" placeholder="{{$key->mausac}}">
<label for="">Giá gốc</label>
<input type="number" name="giagoc" class="form-control" style="width: 40%"  required="required" placeholder="{{$key->giagoc}}">		
<label for="">Số lượng hàng</label>
<input type="number" name="soluong" class="form-control" style="width: 40%"  required="required" placeholder ="{{$key->soluonghang}}">
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
<select name="hang" style="width: 40%" required="required" placeholder="{{$key->hang}}">
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
<input type="number" name="giaban" class="form-control" style="width: 40%" required="required" placeholder="{{$key->giaban}}">
<label for="">Mô tả sản phẩm: </label>
            <textarea name="mota" id=motasanpham required="required">
               
            </textarea>
            <script>
           		config = {};
           		config.entities_latin = false;
           		config.filebrowserBrowseUrl = "{{asset('js/ckfinder/ckfinder.html')}}";
           		config.filebrowserImageBrowseUrl = "{{asset('js/ckfinder/ckfinder.html')}}";
                CKEDITOR.replace('motasanpham',config);
                CKEDITOR.config.height = 400;
				CKEDITOR.config.width = 800;
            </script>
</textarea>
<br>
<button type="submit" class="btn btn-success" style="margin-top: 10px;">Thêm sản phẩm</button>
</form>
@endforeach
	</div>
</div>	
</body>
</html>