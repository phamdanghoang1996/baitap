@foreach($thongtin as $key)
	<option value="{{$key->wardid}}">{{$key->name_ward}}</option>
@endforeach