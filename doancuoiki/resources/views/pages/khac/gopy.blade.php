<!DOCTYPE html>
<html>
<head>
	@include('layouts.btrExtend')
	<script type="text/javascript" src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
</head>
<body>
	@include('layouts.buttonMenu')
	<div class="container">
		<div class="col-md-9">
			<h3>Gửi thư góp ý: </h3>
			<form action="{{route('gopy')}}" method="post" class="form-group">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<label for="">Họ tên: </label>
				<br>
				<input type="text" style="width: 100%" required="required" name="hoten">
				<br>
				<label for="">Email: </label>
				<br>
				<input type="email" style="width: 100%" required="required" name="email">
				<br>
				<label for="">Số điện thoại: </label>
				<br>
				<input type="number" style="width: 100%" required="required" name="sodt">
				<br>
				<label for="">Nội dung: </label>
         	   <textarea name="noidung" id="noidung" required="required">
               
         	   </textarea>
            <script>
           		config = {};
           		config.entities_latin = false;
           		config.filebrowserBrowseUrl = "{{asset('js/ckfinder/ckfinder.html')}}";
           		config.filebrowserImageBrowseUrl = "{{asset('js/ckfinder/ckfinder.html')}}";
                CKEDITOR.replace('noidung',config);
                CKEDITOR.config.height = 300;
				CKEDITOR.config.width = 800;
            </script>
            <button type="submit" class="btn btn-success" style="margin-top: 20px; margin-left: 300px;">Gửi góp ý/Than phiền</button>
			</form>
		</div>
		<div class="col-md-3">
			<div class="row">
				<div class="col-md-12">
					<div class="panel-primary">
						<div class="panel-heading">
							<h4 style="font-weight: bold">Sản phẩm mới nhất</h4>
						</div>
						<div class="panel-body">
							<p>San pham 1</p>
							<p>San pham 1</p>
						</div>
					</div>
				</div>
				<div class="col-md-12">
						<div class="panel-primary">
						<div class="panel-heading">
							<h4 style="font-weight: bold">Sản phẩm bán chạy nhất</h4>
						</div>
						<div class="panel-body">
							<p>San pham 1</p>
							<p>San pham 1</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('layouts.footer')
</body>
</html>