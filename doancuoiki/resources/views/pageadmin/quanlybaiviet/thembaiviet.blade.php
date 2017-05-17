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
	<h3> Thêm bài viết mới: </h3>
		 <form style="margin-top: 20px; margin-left: -140px" class="form-group" action="{{route('thembaiviet')}}" method="post">
		 <input type="hidden" name="_token" value="{{ csrf_token() }}">
		 <label for="">Tiêu đề bài viết</label>
		 	<input type="text" name="tieude" class="form-control" style="margin-bottom: 20px; width: 1000px"  required="required">
		 <label for="">Loại bài viết </label>
		 <br>
		 <select style="width: 1000px" class="form-control" name="loaibaiviet" >
		 		<option value="gioi thieu san pham">Giới thiệu sản phẩm</option>
		 		<option value="tuyen dung">Tuyển dụng</option>
		 </select>
		 <br>
		<label for="">Nội dung</label>
            <textarea name="noidung" id="editor1" required="required">
               
            </textarea>
            <script>
           		config = {};
           		config.entities_latin = false;
           		config.filebrowserBrowseUrl = "{{asset('js/ckfinder/ckfinder.html')}}";
           		config.filebrowserImageBrowseUrl = "{{asset('js/ckfinder/ckfinder.html')}}";
                CKEDITOR.replace('editor1',config);
                CKEDITOR.config.height = 300;
				CKEDITOR.config.width = 1000;
            </script>
            <button type="submit" class="btn btn-success" style="margin-top: 20px; margin-left: 300px;">THÊM BÀI VIẾT</button>
            <a href="{{url('pageadmin/quanlybaiviet/thembaiviet')}}"><button type="button" class="btn btn-danger" style="margin-left: 50px; margin-top: 20px">HỦY BÀI VIẾT</button></a>
        </form>

	</div>
</div>	
</body>
</html>