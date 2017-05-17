<!DOCTYPE html>
<html>
<head>
	@include('layouts.btrExtend')
</head>
<body>
	<div class="row">
		<div class="col-md-4">
			@include('layouts.buttonMenuAdmin')
      <script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
		</div>
		<div class="col-md-8">
			<h3>Quản lý tài khoản nhân viên: </h3>

<div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-plus-sign"> </span> Thêm tài khoản nhân viên
  </button>
  <div class="dropdown-menu dropdown-menu-right" style="width: 100%">
   		<form action="{{route('themnhanvien')}}" method="post" class="form-group">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
   			<label for="" style="margin-left: 10px">Mã số nhân viên: </label>
   			<input type="text" class="form-control" style="width:90%; margin-left: 10px;" name="msnv" required="required">
   			<label for="" style="margin-left: 10px">Họ tên nhân viên: </label>
   			<input type="text" class="form-control" style="width:90%; margin-left: 10px;" name="hoten" required="required">
   			<label for="" style="margin-left: 10px">Địa chỉ: </label>
   			<input type="text" class="form-control" style="width:90%; margin-left: 10px;" name="diachi" required="required">
   			<label for="" style="margin-left: 10px">Điện thoại:  </label>
   			<input type="number" class="form-control" style="width:90%; margin-left: 10px;" name="dienthoai" required="required">
   			<label for="" style="margin-left: 10px">Chức vụ </label>
   			<input type="text" class="form-control" style="width:90%; margin-left: 10px;" name="chucvu" required="required">
   			<label for="" style="margin-left: 10px">Lương</label>
   			<input type="number" class="form-control" style="width:90%; margin-left: 10px;" name="luong" required="required">
   			<div class="text-center"> <button type="sumbit" class="btn-success" style="margin-top: 10px; width: 100px; height: 30px; font-size: 18px; font-weight: bold">Thêm</button> </div>
   		</form>
  </div>
</div>

<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-floppy-disk"> </span> Cập nhật tài khoản nhân viên
  </button>
  <div class="dropdown-menu dropdown-menu-right" style="width: 100%">
   		<form action="{{route('capnhatnhanvien')}}" method="post" class="form-group">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
   			<label for="">Mã số nhân viên: </label>
   			<select class="form-control" style="width:90%; margin-left: 10px;" id="manhanvien" name="manhanvien">
   				@foreach($thongtin as $key1)
   					<option value="{{$key1->msnv}}">{{$key1->msnv}}</option>
   				@endforeach
   			</select>
   			<label for="" style="margin-left: 10px">Họ tên nhân viên: </label>
   			<input type="text" class="form-control"  style="width:90%; margin-left: 10px;" required="required" name="hoten">
   			<label for="" style="margin-left: 10px">Địa chỉ: </label>
   			<input type="text" class="form-control" style="width:90%; margin-left: 10px;" required="required" name="diachi">
   			<label for="" style="margin-left: 10px">Điện thoại:  </label>
   			<input type="number" class="form-control" style="width:90%; margin-left: 10px;" required="required" name="dienthoai">
   			<label for="" style="margin-left: 10px">Chức vụ </label>
   			<input type="text" class="form-control" style="width:90%; margin-left: 10px;" required="required" name="chucvu">
   			<label for="" style="margin-left: 10px">Lương</label>
   			<input type="number" class="form-control" style="width:90%; margin-left: 10px;" required="required" name="luong">
   			<div class="text-center"> <button type="sumbit" class="btn-success" style="margin-top: 10px; width: 100px; height: 30px; font-size: 18px; font-weight: bold">Cập nhật</button> 
        </div>
   		</form>
  </div>
</div>
	
	<div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-plus-sign"> </span> Xóa nhân viên
  </button>
  <div class="dropdown-menu dropdown-menu-right" style="width: 100%">
   		<form action="{{route('xoanhanvien')}}" method="post" class="form-group">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
   			<label for="" style="margin-left: 10px">Mã số nhân viên: </label>
   			<input type="text" class="form-control" style="width:90%; margin-left: 10px;" name="manhanvien">
   			<div class="text-center"> <button type="sumbit" class="btn-success" style="margin-top: 10px; width: 100px; height: 30px; font-size: 18px; font-weight: bold">Xóa</button> </div>
   		</form>
  </div>
</div>
			<table class="table table-bordered" style="margin-top: 20px;margin-left:-100px">
				<tr class="info">
					<th class="text-center">Mã số nhân viên </th>
					<th class="text-center">Họ tên nhân viên </th>
					<th class="text-center">Địa chỉ</th>
					<th class="text-center">Điện thoại</th>
					<th class="text-center">Chức vụ</th>
					<th class="text-center">Lương</th>
				</tr>
        @foreach($thongtin as $key)
				<tr id="input">
					<td class="text-center">{{$key->msnv}}</td>
					<td class="text-center">{{$key->hoten}}</td>
					<td class="text-center">{{$key->diachi}}</td>
					<td class="text-center">{{$key->dienthoai}}</td>
					<td class="text-center">{{$key->chucvu}}</td>
					<td class="text-center">{{$key->luong}} đồng</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</body>
</html>