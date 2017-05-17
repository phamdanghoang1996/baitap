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
	<h3> Trả lời phản hồi khách hàng:  </h3>
		@foreach($thongtin as $key)
		 <form style="margin-top: 20px; margin-left: -140px" class="form-group" action="maphanhoi={{$key->maphkh}}" method="post">
		 <input type="hidden" name="_token" value="{{ csrf_token() }}">
		 
		 <label for="">Đến</label>
		 	<input type="text" name="tieude" class="form-control" style="margin-bottom: 20px; width: 1000px"  required="required" value="{{$key->email}}">
		 @endforeach
		<label for="">Nội dung thư:</label>
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
            <button type="submit" class="btn btn-success" style="margin-top: 20px; margin-left: 300px;">Gửi phản hồi</button>
            <a href="{{url('pageamdin/quanlybaiviet/thembaiviet')}}"><button type="button" class="btn btn-danger" style="margin-left: 50px; margin-top: 20px">Hủy</button></a>
        </form>

	</div>
</div>	
</body>
</html>