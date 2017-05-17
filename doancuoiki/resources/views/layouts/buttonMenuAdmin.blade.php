	<link rel="stylesheet" href="{{asset('css/style_pageadmin/style_adminpage.css')}}">
	
<div class="nav-side-menu">
    <div class="brand">Page Admin</div>
    <i class="" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="{{url('pageadmin/trangchinh')}}">
                  <i class="glyphicon glyphicon-home"></i> Trang chính
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#quanly">
                  <a href="#"><i class="glyphicon glyphicon-folder-open"></i> Quản lý </span></a>
                   <ul class="sub-menu collapse" id="quanly">
                    <li><a href="{{url('pageadmin/quanly/quanlydonhang')}}">Quản lý đơn hàng</a></li>
                    <li data-toggle="collapse" data-target="#baiviet"><a href="{{url('pageadmin/quanly/quanlydonhang')}}">Quản lý bài viết</a>
                         <ul class="sub-menu data-toggle" id="baiviet">
                              <li style="margin-left: 20px;"><a href="{{url('pageadmin/quanly/quanlybaiviet/thembaiviet')}}">Thêm bài viết</a></li>
                              <li style="margin-left: 20px;"><a href="{{url('pageadmin/quanly/quanlybaiviet/lichsubaiviet')}}">Lịch sử bài viết</a></li>
                         </ul>
                    </li>
                    <li><a href="{{url('pageadmin/quanly/quanlyphanhoikhachhang')}}">Quản lý phản hồi khách hàng</a></li>
                    <li><a href="{{url('pageadmin/quanly/quanlytaikhoannhanvien')}}">Quản lý tài khoản nhân viên</a></li>
                </ul>

                </li>

                <li data-toggle="collapse" data-target="#chinhsua" class="collapsed">
                  <a href="#"><i class="glyphicon glyphicon-eye-open"></i> Chỉnh sửa </a>
                </li>  
                <ul class="sub-menu collapse" id="chinhsua" style="list-style: none;">
                  <li><a href="{{url('pageadmin/chinhsua/thongtinsanpham')}}"> Thông tin sản phẩm </a></li>
                  <li>Lịch sử</li>
                  <li>Chưa nghĩ ra</li>
                  <li>Chưa nghĩ ra</li>
                </ul>

               

                <li data-toggle="collapse" data-target="#thongke" class="collapsed">
                  <a href="#"><i class="glyphicon glyphicon-stats"></i> Thống kê </a>
                </li>
                <ul class="sub-menu collapse" id="thongke">
                  <li><a href="#">Thống kê thu nhập</a></li>
                  <li><a href="#">Thống kê tiền lương nhân viên</a></li>
                  <li><a href="#">Báo cáo</a></li>
                </ul>
               
                <li data-toggle="collapse" data-target="#caidat" class="collapsed">
                  <a href="#"><i class="glyphicon glyphicon-wrench"></i> Cài đặt </a>
                </li>  
                <ul class="sub-menu collapse" id="caidat">
                  <li><a href="{{url('pageadmin/caidat/thaydoitaikhoan')}}">Thay đổi tài khoản</a></li>
                  <li><a href="{{url('pageadmin/caidat/themtaikhoan')}}">Thêm tài khoản nhân viên</a></li>
                </ul>
            </ul>
     </div>
</div>
