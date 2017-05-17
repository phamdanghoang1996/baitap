<?php

/*
|--------------------------------------------------------------------------
Ho ten: Pham Dang Hoang
Sinh vien nam 3 - Truong Dai Hoc Cong nghe Thong tin
Email: 14520315@gm.uit.edu.vn
|--------------------------------------------------------------------------
|
|Shop Ban hang
| 
| 
|
*/


Route::group(['prefix'=>'page'],function(){
//TRANG CHÍNH: 
	#Trang Chinh:
	Route::get('trangchinh','pagecontroller@trangchinh');
	#Adidas Nu: 
	Route::get('trangchinh/adidasnu','pagecontroller@adidasnu');
	Route::get('trangchinh/adidasnu/{masp}','pagecontroller@bansp');
	#Adidas Nam:
	Route::get('trangchinh/adidasnam','pagecontroller@adidasnam');
	Route::get('trangchinh/adidasnam/{masp}','pagecontroller@bansp');
	#Nike Nam:
	Route::get('trangchinh/nikenam','pagecontroller@nikenam');
	Route::get('trangchinh/nikenam/{masp}','pagecontroller@bansp');
	#Nike Nu:
	Route::get('trangchinh/nikenu','pagecontroller@nikenu');
	Route::get('trangchinh/nikenu/{masp}','pagecontroller@bansp');
	#Bitis Nam:
	Route::get('trangchinh/bitisnam','pagecontroller@bitisnam');
	Route::get('trangchinh/bitisnam/{masp}','pagecontroller@bansp');
	#Bitis Nu:
	Route::get('trangchinh/bitisnu', 'pagecontroller@bitisnu');
	Route::get('trangchinh/bitisnam/{masp}','pagecontroller@bansp');
	#Non Adidas:
	Route::get('trangchinh/non/adidas','pagecontroller@nonadidas');
	Route::get('trangchinh/non/adidas/{masp}','pagecontroller@bansp');
	#Non Nike:
	Route::get('trangchinh/non/nike','pagecontroller@nonnike');
	Route::get('trangchinh/non/nike/{masp}','pagecontroller@bansp');
	#Lien he:
	Route::get('trangchinh/lienhe', function(){
		return view('pages.lienhe');
	});
	Route::get('trangchinh/muahang/{masanpham}','pagecontroller@muahang');
	Route::get('trangchinh/giohang',['as'=>'giohang','uses'=>'pagecontroller@giohang']);
	Route::get('trangchinh/giohang/xoagiohang/{id}','pagecontroller@xoaGiohang');
	Route::get('trangchinh/loc/size={size}&fr_gia={fr_gia}&t_gia={t_gia}&doituong={doituong}','pagecontroller@getLoc');
	
//THÔNG TIN KHÁCH HÀNG: 
	Route::post('thongtinkhachhang',['as'=>'thongtinkhachhang','uses'=>'pagecontroller@thongtinkhachhang']);
	Route::get('thongtinkhachhang/{provinceid}','pagecontroller@ajax_tinh');
	Route::get('thongtinkhachhang/phiship/{provinceid}','pagecontroller@ajax_phiship');
	Route::get('thongtinkhachhang/huyen/{districtid}','pagecontroller@ajax_huyen');
	Route::get('ghinhanthongtin',function(){
		return view('pages.ghinhanthongtin');
	});
	Route::post('ghinhanthongtin',['as'=>'ghinhanthongtin','uses'=>'pagecontroller@ghinhanthongtin']);
//KHÁC: 
	Route::group(['prefix'=>'thongtin'], function(){
		Route::get('gioithieu','pagecontroller@gioiThieu');
		Route::get('tuyendung','pagecontroller@tuyenDung');
		Route::get('gopy','pagecontroller@getgopy');
		Route::post('gopy','pagecontroller@postgopy')->name('gopy');
	});
	Route::group(['prefix'=>'FAQ'], function(){
		Route::get('vanchuyen','pagecontroller@vanChuyen');
		Route::get('chinhsachdoitra','pagecontroller@chinhSachdoitra');
		Route::get('chinhsachbaohanh','pagecontroller@chinhSachbaohanh');
		Route::get('doitaccungcap','pagecontroller@doiTaccungcap');
	});
});
//ADMIN: 



route::get('pageadmin/dangnhap','admincontroller@getLogin');
route::post('pageadmin/dangnhap','admincontroller@postLogin')->name('dangnhap');

Route::group(['prefix'=>'pageadmin'],function(){
#TRANG CHÍNH
	Route::get('trangchinh','admincontroller@trangChinh');
	Route::get('trangchinh/hang_hoho={hang}','admincontroller@ajax_trangchinh');
	Route::get('trangchinh/hang_hehe@masp={masp}','admincontroller@ajax_bieudo');
#QUẢN LÝ: 	
	Route::group(['prefix'=>'quanly'],function(){
		#QUẢN LÝ ĐƠN HÀNG
		Route::get('quanlydonhang','admincontroller@getQuanlydonhang');
		Route::get('quanlydonhang/suadonhang/{mahd}','admincontroller@getSuadonhang');
		Route::post('quanlydonhang/suadonhang/{mahd}','admincontroller@postSuadonhang');
		Route::get('quanlydonhang/xoadonhang/{mahd}','admincontroller@getXoadonhang');
		Route::post('quanlydonhang/xoadonhang/{mahd}','admincontroller@postXoadonhang');
		Route::get('quanlydonhang/indonhang/{mahd}','admincontroller@getIndonhang');
		Route::post('quanlydonhang/indonhang/{mahd}','admincontroller@postIndonhang');
		#QUẢN LÝ PHẢN HỒI KHÁCH HÀNG
		Route::get('quanlyphanhoikhachhang','admincontroller@quanlyphanhoikhachhang');
		Route::get('quanlyphanhoikhachhang/traloiphanhoi/maphanhoi={maphanhoi}','admincontroller@getTraloiphanhoi');
		Route::post('quanlyphanhoikhachhang/traloiphanhoi/maphanhoi={maphanhoi}','admincontroller@postTraloiphanhoi');
		Route::get('quanlyphanhoikhachhang/xoaphanhoi/maphanhoi={maphanhoi}','admincontroller@getXoaphanhoi');
		Route::post('quanlyphanhoikhachhang/xoaphanhoi/maphanhoi={maphanhoi}','admincontroller@postXoaphanhoi');
		#QUẢN LÝ NHÂN VIÊN: 
		Route::get('quanlytaikhoannhanvien','admincontroller@quanlytaikhoannhanvien');
		Route::get('quanlytaikhoannhanvien/themnhanvien','admincontroller@getThemnhanvien');
		Route::post('quanlytaikhoannhanvien/themnhanvien','admincontroller@postThemnhanvien')->name('themnhanvien');
		Route::get('quanlytaikhoannhanvien/capnhatnhanvien','admincontroller@getCapnhatnhanvien');
		Route::post('quanlytaikhoannhanvien/capnhatnhanvien','admincontroller@postCapnhatnhanvien')->name('capnhatnhanvien');
		Route::get('quanlytaikhoannhanvien/xoanhanvien','admincontroller@getXoanhanvien');
		Route::post('quanlytaikhoannhanvien/xoanhanvien','admincontroller@postXoanhanvien')->name('xoanhanvien');
		Route::get('quanlytaikhoannhanvien/timkiemnhanvien','admincontroller@getTimkiemnhanvien');
		Route::post('quanlytaikhoannhanvien/timkiemnhanvien','admincontroller@postTimkiemnhanvien');
		#QUẢN LÝ BÀI VIẾT:
		Route::group(['prefix'=>'quanlybaiviet'],function(){
		Route::get('thembaiviet','admincontroller@getThembaiviet');
		Route::post('thembaiviet','admincontroller@postThembaiviet')->name('thembaiviet');
		Route::get('lichsubaiviet','admincontroller@getLichsubaiviet');
		Route::get('lichsubaiviet/chinhsua/mabaiviet={mabaiviet}','admincontroller@getChinhsuabaiviet');
		Route::post('lichsubaiviet/chinhsua/mabaiviet={mabaiviet}','admincontroller@postChinhsuabaiviet');
		Route::get('lichsubaiviet/xoabaiviet/mabaiviet={mabaiviet}','admincontroller@getXoabaiviet');
		Route::post('lichsubaiviet/xoabaiviet/mabaiviet={mabaiviet}','admincontroller@postXoabaiviet');
	});

		
	});
	#CHỈNH SỬA
	Route::group(['prefix'=>'chinhsua'],function(){
		Route::get('thongtinsanpham','admincontroller@thongtinsanpham');
		Route::get('themsanpham','admincontroller@getThemsanpham');
		Route::post('themsanpham','admincontroller@postThemsanpham')->name('themsanpham');
		Route::get('thongtinsanpham/capnhatsanpham/{masp}','admincontroller@getCapnhatsanpham');
		Route::post('thongtinsanpham/capnhatsanpham/{masp}','admincontroller@postCapnhatsanpham');
		Route::get('thongtinsanpham/xoasanpham/{masp}','admincontroller@getXoasanpham');
		Route::post('thongtinsanpham/xoasanpham/{masp}','admincontroller@postXoasanpham');
		Route::get('lichsu','admincontroller@lichsu');
	});
	
	#THỐNG KÊ
		Route::group(['prefix'=>'thongke'],function(){
		Route::get('thongkethunhap','admincontroller@thongkethunhap');
		Route::get('thongketienluongnhanvien','admincontroller@thongketienluongnhanvien');
		Route::get('baocao','admincontroller@baocao');

	}); 	
	
#CÀI ĐẶT
	Route::group(['prefix'=>'caidat'],function(){
		Route::get('thaydoitaikhoan','admincontroller@getThaydoitaikhoan');
		Route::post('thaydoimatkhau','admincontroller@postThaydoitaikhoan')->name('thaydoimatkhau');
		Route::get('themtaikhoan','admincontroller@getThemtaikhoan');
		Route::post('themtaikhoan','admincontroller@postThemtaikhoan')->name('themtaikhoan');
	});
	
});
Route::post('timkiemsp',['as'=>'timkiemsp','uses'=>'pagecontroller@timkiemsp']);


Route::get('bieudo','pagecontroller@bieudo');
