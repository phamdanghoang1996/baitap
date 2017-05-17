<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Requests;
use App\kho;
use App\sanpham;
use App\khachhang;
use App\cthd;
use App\phanhoikhachhang;
use App\traloiphanhoi;
use App\timkiem;
use DB;
use Cart;
use Carbon\Carbon;
use Session;
class pagecontroller extends Controller
{
    public function trangchinh(){
           	$chaynhat=DB::table('sanpham')->join('kho','sanpham.masp','=','kho.masp')->orderBy('luotban','desc')->skip(0)->take(20)->get();
          	return view('pages.trangchinh',['chaynhat'=>$chaynhat]);
    }
    public function adidasnu(){
    	       $adnu=DB::table('sanpham')->join('kho','sanpham.masp','=','kho.masp')->where([
                ['doituong','=','nu'],
                ['hang','=','adidas'],
                ['loaisp','=','Giay'],])->get();
             return view('pages.adidasnu',['adnu'=>$adnu]);
		}  
    public function adidasnam(){
             $adnam=DB::table('sanpham')->join('kho','sanpham.masp','=','kho.masp')->where([
              ['doituong','=','nam'],
              ['hang','=','adidas'],
              ['loaisp','=','Giay'],])->get();
             return view('pages.adidasnam',['adnam'=>$adnam]);
    }
    public function nikenam(){
              $nknam=DB::table('sanpham')->join('kho','sanpham.masp','=','kho.masp')->where([
                ['doituong','=','nam'],
                ['hang','=','nike'],
                ['loaisp','=','Giay'],])->get();
              return view('pages.nikenam',['nknam'=>$nknam]);  
    }
    public function nikenu(){
              $nknu=DB::table('sanpham')->join('kho','sanpham.masp','=','kho.masp')->where([
                ['doituong','=','nu'],
                ['hang','=','nike'],
                ['loaisp','=','Giay'],])->get();
              return view('pages.nikenu',['nknu'=>$nknu]);
    }
    public function nonadidas(){
          $nonadidas=DB::table('sanpham')->join('kho','sanpham.masp','=','kho.masp')->where([
                    ['hang','=','adidas'],
                    ['loaisp','=','Non'],])->get();
          return view('pages.nonadidas',['nonadidas'=>$nonadidas]);
          foreach ($nonadidas as $key) {
            echo $key->masp;
          }
    }
    public function nonnike(){
              $nonnike=DB::table('sanpham')->join('kho','sanpham.masp','=','kho.masp')->where([
                    ['hang','=','nike'],
                    ['loaisp','=','Non'],])->get();
            return view('pages.nonnike',['nonnike'=>$nonnike]);
    }
    public function bitisnam(){
              $binam=DB::table('sanpham')->join('kho','sanpham.masp','=','kho.masp')->where([
                ['doituong','=','nam'],
                ['hang','=','bitis'],
                ['loaisp','=','Giay'],])->get();
             return view('pages.bitisnam',['binam'=>$binam]);
           }
//GIO HANG:
    public function muahang($masanpham){
      $thongtin = DB::table('sanpham')->where('masp',$masanpham)->first();
      $tensp = 'San pham 1';
      Cart::add(array('id'=>$masanpham, 'name'=>$tensp, 'price'=>$thongtin->giaban,'qty'=>1, 'options'=>array('img'=>$thongtin->urlhinh)));
      $content = Cart::content();
      return redirect()->route('giohang');
    }
    public function giohang(){
      $content = Cart::content();
      $total = Cart::total();
      return view('pages.giohang',compact('content','total'));
    }
    public function xoaGiohang($id){
      Cart::remove($id);
      return redirect()->route('giohang');
    }
    public function getLoc($size,$fr_gia,$t_gia,$doituong){
      if($size!=0){
        $thongtin = DB::table('kho')->join('sanpham','kho.masp','=','sanpham.masp')->where('size',$size)->get();
       return view('pages.loc',['thongtin'=>$thongtin]);
      }
      if($doituong=='nam'||$doituong=='nu'){
        $thongtin = DB::table('kho')->join('sanpham','kho.masp','=','sanpham.masp')->where('doituong',$doituong)->get();
       return view('pages.loc',['thongtin'=>$thongtin]);
      }
      if($t_gia<=3500000){
        echo "lenh 1";
         $thongtin = DB::table('kho')->join('sanpham','kho.masp','=','sanpham.masp')->where([
          ['giaban','>=',$fr_gia],
          ['giaban','<=',$t_gia],
          ])->get();
         return view('pages.loc',['thongtin'=>$thongtin]);
         }
      if($t_gia==3500001){
        $thongtin = DB::table('kho')->join('sanpham','kho.masp','=','sanpham.masp')->where('giaban','>',$t_gia)->get();
         return view('pages.loc',['thongtin'=>$thongtin]); 
      }
    }
//TÌM KIẾM SẢN PHẨM: 
    public function timkiemsp(Request $req){

        $timkiem=DB::table('sanpham')->join('kho','sanpham.masp','=','kho.masp')->where('hang','=',$req->tensp)->orwhere('doituong','=',$req->tensp)->get();
      
       return view('pages.timkiemsp', ['timkiem'=>$timkiem]);
    }
    public function bansp($masp){
     $sanpham = DB:: table('sanpham')->join('kho','sanpham.masp','=','kho.masp')->where('kho.masp','=',$masp)->get();
      return view('pages/bansp',['bansp'=>$sanpham]);
    }


#THÔNG TIN KHÁCH HÀNG: 
    public function thongtinkhachhang(Request $req){
      if(empty($req)){
        echo "Thông tin giỏ hàng trống";
      }
      else {
        $tinh = DB::table('province')->get();
      return view('pages/thongtinkhachhang',['thongtinsp'=>$req,'tinh'=>$tinh]);
      } 
    }
    public function ajax_tinh($provinceid){
      $thongtin = DB::table('district')->where('provinceid','=',$provinceid)->get();
      return view('pages.ajaxtinh',['thongtin'=>$thongtin]);
    }
    public function ajax_huyen($districtid){
      $thongtin = DB::table('ward')->where('districtid','=',$districtid)->get();
      return view('pages.ajaxhuyen',['thongtin'=>$thongtin]);
    }
    public function ajax_phiship($provinceid){
      $thongtin = DB::table('vanchuyen')->where('matinh','=',$provinceid)->get();
      foreach ($thongtin as $key ) {
        echo number_format($key->sotien);
        echo "<input type='hidden' class='form-control' name='phiship' value='$key->sotien'>";
      } 
      
    }
    public function ghinhanthongtin(Request $r){
      //Lay du lieu tu FORM ne!
      $masp = $r->masp;
      $tenkhachhang = $r->tenkh;
      $gioitinh = $r->gioitinh;
      $provinceid = $r->provinceid;
      $districtid = $r->districtid;
      $tiensanpham = $r->tiensanpham;
      $phiship = $r->phiship;
      $wardid = $r->wardid;
      $email = $r->email;
      $dienthoai = $r->dienthoai;
      $soluong = $r->soluong;
      $tienship = DB::table('vanchuyen')->where('matinh',$provinceid)->get(); 
      //Insert du lieu vao bang Khach hang
     
      $thongtinkhachhang = new khachhang();
      $thongtinkhachhang->tenkh = $tenkhachhang;
      $thongtinkhachhang->soluongdat = $soluong;
      $thongtinkhachhang->gioitinh = $gioitinh;
      $thongtinkhachhang->email = $email;
      $thongtinkhachhang->dienthoai = $dienthoai;
      $thongtinkhachhang->provinceid = $provinceid;
      $thongtinkhachhang->districtid = $districtid;
      $thongtinkhachhang->wardid = $wardid;
      $thongtinkhachhang->save();
      //Insert du lieu vao bang Chi tiet hoa don
      $cthd = new cthd();
      $cthd->masp = $masp;
      $cthd->makh = "7";
      $cthd->soluong = $soluong;
      $cthd->tiensanpham=$tiensanpham;
      $cthd->phiship = $phiship;
      $ngaybanhang = Carbon::now();
      $cthd->ngaybanhang = $ngaybanhang;
      $cthd->trangthai = "Thành công";
      $cthd->save(); 
   return view('pages/ghinhanthongtin',['khachhang'=>$r]);
    }

    //KHÁC
   public function getgopY(){
      return view('pages.khac.gopy');
   }
   public function postgopY(Request $request){
    $hoten = $request->hoten;
    $email = $request->email;
    $sodienthoai = $request->sodt;
    $noidung = $request->noidung;
    $ngayguiphanhoi = Carbon::now();
    $phanhoi = new phanhoikhachhang();
    $phanhoi->hoten = $hoten;
    $phanhoi->email = $email;
    $phanhoi->sodienthoai = $sodienthoai;
    $phanhoi->thuphanhoi = $noidung;
    $phanhoi->ngayguiphanhoi=$ngayguiphanhoi;
    $phanhoi->save();
    $maph = DB::table('phanhoikhachang')->max('maph');
    $tl_phanhoi = new traloiphanhoi();
    $tl_phanhoi->maphkh = $maph;
    $tl_phanhoi->save();
    
   }
   public function gioiThieu(){
    return view('pages.khac.gioithieushop');
   }
   public function tuyenDung(){
    return view('pages.khac.tuyendung');
   }
   public function vanChuyen(){
    return view('pages.khac.vanchuyen');
   }
   public function chinhSachdoitra(){
    return view('pages.khac.chinhsachdoitra');
   }
   public function chinhSachbaohanh(){
    return view('pages.khac.chinhsachbaohanh');
   }
   public function khachHangvip(){
    return view('pages.khac.khachhangvip');
   }
   public function doiTaccungcap(){
    return view('pages.khac.doitaccungcap');
   }
   public function bieudo(){
    return view('pages.bieudo');
   }
}

