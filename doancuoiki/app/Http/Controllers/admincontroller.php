<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\kho;
use App\sanpham;
use App\nhanvien;
use App\traloiphanhoi;
use App\phanhoikhachhang;
use App\cthd;
use App\taikhoan;
use App\baiviet;
use DB;
use PDF;
use Carbon\Carbon;
use MONTH;
class admincontroller extends Controller
{
    public function getLogin(){
        return view('pageadmin.dangnhap');
    }
    public function postLogin(Request $request){
        $username=$request->username;
        $password=$request->password;
        $thongtin = DB::table('user')->where([
          ['taikhoan','=',$username],
          ['matkhau','=',$password],
          ])->get();
        if(empty($thongtin)){
            return view('pageadmin.dangnhap'); 
         }
         else{
           return view('pageadmin.pageadmin');
         } 
    }
#TRANG CHÍNH: 
    public function trangChinh(){
      //Lấy cái cho trang chính:
        $count_donhang = cthd::count();
        $count_phanhoi = phanhoikhachhang::count();
        $doanhthu = DB::table('cthd')->sum('tiensanpham')+DB::table('cthd')->sum('phiship');
        $ngayhomnay = Carbon::now();
      //Lấy cái thông tin cho thống kê sản phẩm bán chạy nhất
      $sum_bc = DB::table('cthd')->sum('soluong');
      $thongke_bc = DB::table('cthd')->orderBy('soluong','desc')->limit(5)->get();
      $arvg = array();
      $name_sp = array();
      $i=0;
        foreach ($thongke_bc as $key) {
          $name_sp[$i] = $key->masp;
          $arvg[$i] = $key->soluong/$sum_bc;
          $i++;
        } 

      //Lấy giá trị thống kê cho doanh thu 
        $hang = DB::table('sanpham')->join('kho','kho.masp','=','sanpham.masp')->groupBy('hang')->get();
      //Trả về giá trị cho trang chính
     return view('pageadmin.trangchinh.trangchinh',['count_donhang'=>$count_donhang,'count_phanhoi'=>$count_phanhoi,'doanhthu'=>$doanhthu,'ngayhomnay'=>$ngayhomnay,'name_sp'=>$name_sp,'arvg'=>$arvg,'hang'=>$hang]);
    }
public function ajax_trangchinh($hang){
  $thongtin = DB::table('sanpham')->join('kho','kho.masp','=','sanpham.masp')->where('hang',$hang)->get();
  return view('pageadmin.trangchinh.ajax_hang',['thongtin'=>$thongtin]);
}
public function ajax_bieudo($masp){
  $sum_thang = array();
  for ($i=1; $i <= 12 ; $i++) { 
     $sum_thang[$i] = DB::table('cthd')->where('masp',$masp)->whereMonth('ngaybanhang','=',"$i")->sum('tiensanpham');
     if(empty($sum_thang[$i])){
      $sum_thang[$i]=0;
     }
     else {
      $sum_thang[$i]=$sum_thang[$i]/1000000;
     }
  }
  return view('layouts.bieudo_doanhso',['thang'=>$sum_thang,'thang1'=>$sum_thang]);
}


#QUẢN LÝ ĐƠN HÀNG: 
    public function getQuanlydonhang(){
       $thongtin=DB::table('khachhang')->join('cthd','khachhang.makh','=','cthd.makh')->join('province','khachhang.provinceid','=','province.provinceid')->join('district','khachhang.districtid','=','district.districtid')->join('ward','khachhang.wardid','=','ward.wardid')->get();
    return view('pageadmin.quanlydonhang.quanlydonhang',['thongtin'=>$thongtin]);
    }
   
    public function getSuadonhang($mahd){
        $thongtin = DB::table('cthd')->where('mahd','=',$mahd)->get();
        return view('pageadmin.quanlydonhang.suadonhang',['thongtin'=>$thongtin]);
    }
    public function postSuadonhang($mahd, Request $request){
     $mahd = $request->mahd;
     $soluong = $request->soluong;
     $trangthai =$request->trangthai;
     DB::table('cthd')->where('mahd','=',$mahd)->update(['soluong'=>$soluong,'trangthai'=>$trangthai]);
     return view('pageadmin.quanlydonhang.thongbaosua');
    }

    public function getXoadonhang($mahd){
       $thongtin = DB::table('cthd')->where('mahd','=',$mahd)->get();
     return view('pageadmin.quanlydonhang.xoadonhang',['thongtin'=>$thongtin]);
    }

    public function postXoadonhang($mahd, Request $request){
        $thongtin=DB::table('khachhang')->join('cthd','khachhang.makh','=','cthd.makh')->get();
        DB::table('cthd')->where('mahd','=',$request->mahd)->delete();
        return view('pageadmin.quanlydonhang.thongbaoxoa',['thongtin'=>$mahd]);
    }

    public function getIndonhang($mahd){
       $thongtin=DB::table('khachhang')->join('cthd','khachhang.makh','=','cthd.makh')->join('province','khachhang.provinceid','=','province.provinceid')->join('district','khachhang.districtid','=','district.districtid')->join('ward','khachhang.wardid','=','ward.wardid')->where('mahd','=',$mahd)->get();
      $ngayxuathoadon=Carbon::now();
   //   $pdf = PDF::loadView('pageadmin.quanlydonhang.indonhang',['thongtin'=>$thongtin,'ngayxuathoadon'=>$ngayxuathoadon]);
      return view('pageadmin.quanlydonhang.indonhang',['thongtin'=>$thongtin,'ngayxuathoadon'=>$ngayxuathoadon]);
      return $pdf->stream('cthd.pdf');
    }


    #QUẢN LÝ PHẢN HỒI KHÁCH HÀNG
    public function quanlyphanhoikhachhang(){
        $thongtin=DB::table('phanhoikhachang')->get();
        return view('pageadmin.quanlyphanhoikhachhang.quanlyphanhoikhachhang',['thongtin'=>$thongtin]);
    }
    public function getTraloiphanhoi($maphanhoi,Request $request){
     $thongtin = DB::table('traloiphanhoi')->join('phanhoikhachang','phanhoikhachang.maph','=','traloiphanhoi.maphkh')->where('maphkh','=',$request->maphanhoi)->get();
     return view('pageadmin.quanlyphanhoikhachhang.traloiphanhoi',['thongtin'=>$thongtin]);
    }
    public function postTraloiphanhoi($maphanhoi, Request $request){
      $ngayguiphanhoi = Carbon::now();
      DB::table('traloiphanhoi')->where('maphkh','=',$maphanhoi)->update(['noidung'=>$request->noidung,'ngayguiphanhoi'=>$ngayguiphanhoi]);
      echo "Trả lời thành công";
    }
    public function getXoaphanhoi($maphanhoi){
      $thongtin = DB::table('phanhoikhachang')->where('maph','=',$maphanhoi)->get();
      return view('pageadmin.quanlyphanhoikhachhang.xoaphanhoi',['thongtin'=>$thongtin]);
    }
    public function postXoaphanhoi($maphanhoi, Request $request){
      DB::table('traloiphanhoi')->where('maphkh','=',$request->maphanhoi)->delete();
      DB::table('phanhoikhachang')->where('maph','=',$request->maphanhoi)->delete();
      return view('pageadmin.quanlyphanhoikhachhang.quanlyphanhoikhachhang');
    }

#CHỈNH SỬA SẢN PHẨM
    public function thongtinsanpham(){
      $thongtin = kho::paginate(9);
      return view('pageadmin.chinhsua.thongtinsanpham',['thongtin'=>$thongtin]);
    }
    public function getThemsanpham(){
        return view('pageadmin.chinhsua.themsanpham');
    }
    public function postThemsanpham(Request $request)
    {
     function themdulieukho($b1,$b2,$b3,$b4,$b5,$b6,$b7,$b8,$b9,$b10){
          $thongtin=new kho();
          $thongtin->masp = $b1;
          $thongtin->loaisp = $b2;
          $thongtin->tensp = $b3;
          $thongtin->mausac=$b4;
          $thongtin->giagoc=$b5;
          $thongtin->soluonghang=$b6;
          $thongtin->size=$b7;
          $thongtin->hang=$b8;
          $thongtin->doituong=$b9;
          $thongtin->ngaynhapkho=$b10;
          $thongtin->save();
      }
      function themdulieusanpham($b1,$b2,$b4,$b5){
          $thongtinsp = new sanpham();
          $thongtinsp->masp=$b1;
          $thongtinsp->urlhinh=$b2;
          $thongtinsp->motasp=$b4;
          $thongtinsp->giaban=$b5;
          $thongtinsp->save();
      }
      //DO it san pham nen lam vay... HUHU. Minh that ngu ngoc
        $thongbao=1;
        $file=$request->file('hinhanh');
        $count=kho::where('masp','=',$request->masp)->count();
        $ngaynhapkho=Carbon::now();
        $urlhinh_hover=" ";
        $png=".png";
        $jpg=".jpg";
        $url="http://localhost:8000/doancuoiki/public/";
        $dau="/";
        if($file->getClientOriginalExtension('hinhanh')=='jpg'){
          $tenhinh=$request->masp.$jpg;
        }
        else if($file->getClientOriginalExtension('hinhanh')=='png'){
          $tenhinh=$request->masp.$png;
        }
        else {
          $tenhinh="Không tồn tại";
        }
        if($count==0)
        {
    if($file->getClientOriginalExtension('hinhanh')=='jpg'||$file->getClientOriginalExtension('hinhanh')=='png') 
      {
            $filename=$file->getClientOriginalName('hinhanh'); 
           if($request->loaisanpham=="giay")
          {
                                if($request->hang=="adidas")
                                {
                                      if ($request->doituong=="nam") {
                                        $link='img/img_sp/adidas/nam';
                                        $urlhinh=$url.$link.$dau.$tenhinh;
                                     $file->move($link,$tenhinh);
                                            updateKho($request->masp, $request->loaisanpham,$request->tensanpham,
                                              $request->mausac,$request->giagoc,$request->soluong,$request->size
                                              ,$request->hang,$request->doituong,$ngaynhapkho);
                                            updateKho($request->masp,$urlhinh,$request->mota,$request->giaban);
                                      }
                                      else {
                                        $link='img/img_sp/adidas/nu';
                                        $urlhinh=$url.$link.$dau.$tenhinh;
                                        $file->move($link,$tenhinh);
                                        updateKho($request->masp, $request->loaisanpham,$request->tensanpham,
                                              $request->mausac,$request->giagoc,$request->soluong,$request->size
                                              ,$request->hang,$request->doituong,$ngaynhapkho);
                                        updateKho($request->masp,$urlhinh,$request->mota,$request->giaban);
                                      }
                                }
                              else if($request->hang=="nike")
                              {
                                  if($request->doituong=="nam")
                                    {
                                       $link='img/img_sp/nike/nam';
                                       $urlhinh=$url.$link.$dau.$tenhinh;
                                       $file->move($link,$tenhinh);
                                     updateKho($request->masp, $request->loaisanpham,$request->tensanpham,
                                            $request->mausac,$request->giagoc,$request->soluong,$request->size
                                            ,$request->hang,$request->doituong,$ngaynhapkho);
                                     updateKho($request->masp,$urlhinh,$request->mota,$request->giaban);
                                    }
                                 else 
                                    {
                                      $link='img/img_sp/nike/nu';
                                      $urlhinh=$url.$link.$dau.$tenhinh;
                                      $file->move($link,$tenhinh);
                                    updateKho($request->masp, $request->loaisanpham,$request->tensanpham,
                                            $request->mausac,$request->giagoc,$request->soluong,$request->size
                                            ,$request->hang,$request->doituong,$ngaynhapkho);
                                    updateKho($request->masp,$urlhinh,$request->mota,$request->giaban);
                                   }
                             }
                               else if($request->hang=="bitis")
                               {
                                  if($request->doituong=="nam")
                                  {
                                       $link='img/img_sp/bitis/nam';
                                       $urlhinh=$url.$link.$dau.$tenhinh;
                                       $file->move($link,$tenhinh);
                                      updateKho($request->masp, $request->loaisanpham,$request->tensanpham,
                                              $request->mausac,$request->giagoc,$request->soluong,$request->size
                                              ,$request->hang,$request->doituong,$ngaynhapkho);
                                      updateKho($request->masp,$urlhinh,$request->mota,$request->giaban);
                                  }
                                  else {
                                     $link='img/img_sp/bitis/nu';
                                     $urlhinh=$url.$link.$dau.$tenhinh;
                                     $file->move($link,$tenhinh);
                                      updateKho($request->masp, $request->loaisanpham,$request->tensanpham,
                                              $request->mausac,$request->giagoc,$request->soluong,$request->size
                                              ,$request->hang,$request->doituong,$ngaynhapkho);
                                      updateKho($request->masp,$urlhinh,$request->mota,$request->giaban);
                                  }
                               }
                               return view('pageadmin.chinhsua.thongbao',['thongbao'=>$thongbao]);
        }

                           else if($request->loaisanpham=="non")
                           {
                              if($request->hang=="nike")
                                {
                                $link='img/img_sp/mu/nike';
                                $urlhinh=$url.$link.$dau.$tenhinh;
                                $file->move($link,$tenhinh);
                                updateKho($request->masp, $request->loaisanpham,$request->tensanpham,
                                          $request->mausac,$request->giagoc,$request->soluong,$request->size
                                          ,$request->hang,$request->doituong,$ngaynhapkho);
                                updateKho($request->masp,$urlhinh,$request->mota,$request->giaban);
                                }
                              else if($request->hang=="adidas")
                              {
                                $link='img/img_sp/mu/adidas';
                                $urlhinh=$url.$link.$dau.$tenhinh;
                                $file->move($link,$tenhinh);
                                  updateKho($request->masp, $request->loaisanpham,$request->tensanpham,
                                          $request->mausac,$request->giagoc,$request->soluong,$request->size
                                          ,$request->hang,$request->doituong,$ngaynhapkho);
                                 updateKho($request->masp,$urlhinh,$request->mota,$request->giaban);
                              }
                              else
                              {
                                $thongbao="Không có sản phẩm nón Bitis";
                              }
                           }
                            return view('pageadmin.chinhsua.thongbao',['thongbao'=>$thongbao]);
    }

       else
        {
            $thongbao="Sai định dạng File";
            return view('pageadmin.chinhsua.thongbao',['thongbao'=>$thongbao]);
        }
    }

      else
      {
         $thongbao="Bị trùng mã số sản phẩm";
         return view('pageadmin.chinhsua.thongbao',['thongbao'=>$thongbao]);
      }
}


    public function getCapnhatsanpham($masp){
        $thongtin=DB::table('kho')->join('sanpham','kho.masp','=','sanpham.masp')->where('kho.masp','=',$masp)->get();
        return view('pageadmin.chinhsua.capnhatsanpham',['thongtin'=>$thongtin]);
    }



    public function postCapnhatsanpham(Request $request){
      function updatekho($b1,$b2,$b3,$b4,$b5,$b6,$b7,$b8,$b9,$b10)
        {
          DB::table('kho')->where('masp',$b1)->update(['loaisp'=>$b2,'tensp'=>$b3,'mausac'=>$b4,'giagoc'=>$b5,'soluonghang'=>$b6,'size'=>$b7,'hang'=>$b8,'doituong'=>$b9,'ngaynhapkho'=>$b10]);
        }
        function updatesanpham($b1,$b2,$b4,$b5)
        {
          DB::table('sanpham')->where('masp',$b1)->update(['urlhinh'=>$b2,'motasp'=>$b4,'giaban'=>$b5]);
        }
       $thongbao=1;
        $file=$request->file('hinhanh');
        $count=kho::where('masp','=',$request->masp)->count();
        $ngaynhapkho=Carbon::now();
        $urlhinh_hover=" ";
        $png=".png";
        $jpg=".jpg";
        $url="http://localhost:8000/doancuoiki/public/";
        $dau="/";
        if($file->getClientOriginalExtension('hinhanh')=='jpg')
                {
                  $tenhinh=$request->masp.$jpg;
                }
        else if($file->getClientOriginalExtension('hinhanh')=='png')
                {
                  $tenhinh=$request->masp.$png;
                }
        else 
                {
                  $tenhinh="Không tồn tại";
                }
        if($file->getClientOriginalExtension('hinhanh')=='jpg'||$file->getClientOriginalExtension('hinhanh')=='png')
         {
               if($request->loaisanpham=="giay")
               {
                          if($request->hang=="adidas")
                                {
                                      if ($request->doituong=="nam") {
                                        $link='img/img_sp/adidas/nam';
                                        $urlhinh=$url.$link.$dau.$tenhinh;
                                     $file->move($link,$tenhinh);
                                            updatekho($request->masp, $request->loaisanpham,$request->tensanpham,
                                              $request->mausac,$request->giagoc,$request->soluong,$request->size
                                              ,$request->hang,$request->doituong,$ngaynhapkho);
                                            updatesanpham($request->masp,$urlhinh,$request->mota,$request->giaban);
                             }
                                      else {
                                        $link='img/img_sp/adidas/nu';
                                        $urlhinh=$url.$link.$dau.$tenhinh;
                                        $file->move($link,$tenhinh);
                                        updatekho($request->masp, $request->loaisanpham,$request->tensanpham,
                                              $request->mausac,$request->giagoc,$request->soluong,$request->size
                                              ,$request->hang,$request->doituong,$ngaynhapkho);
                                        updatesanpham($request->masp,$urlhinh,$request->mota,$request->giaban);
                                      }
                                }
                              else if($request->hang=="nike")
                              {
                                  if($request->doituong=="nam")
                                    {
                                       $link='img/img_sp/nike/nam';
                                       $urlhinh=$url.$link.$dau.$tenhinh;
                                       $file->move($link,$tenhinh);
                                     updatekho($request->masp, $request->loaisanpham,$request->tensanpham,
                                            $request->mausac,$request->giagoc,$request->soluong,$request->size
                                            ,$request->hang,$request->doituong,$ngaynhapkho);
                                     updatesanpham($request->masp,$urlhinh,$request->mota,$request->giaban);
                                    }
                                 else 
                                    {
                                      $link='img/img_sp/nike/nu';
                                      $urlhinh=$url.$link.$dau.$tenhinh;
                                      $file->move($link,$tenhinh);
                                    updatekho($request->masp, $request->loaisanpham,$request->tensanpham,
                                            $request->mausac,$request->giagoc,$request->soluong,$request->size
                                            ,$request->hang,$request->doituong,$ngaynhapkho);
                                    updatesanpham($request->masp,$urlhinh,$request->mota,$request->giaban);
                                   }
                             }
                               else if($request->hang=="bitis")
                               {
                                  if($request->doituong=="nam")
                                  {
                                       $link='img/img_sp/bitis/nam';
                                       $urlhinh=$url.$link.$dau.$tenhinh;
                                       $file->move($link,$tenhinh);
                                      updatekho($request->masp, $request->loaisanpham,$request->tensanpham,
                                              $request->mausac,$request->giagoc,$request->soluong,$request->size
                                              ,$request->hang,$request->doituong,$ngaynhapkho);
                                      updatesanpham($request->masp,$urlhinh,$request->mota,$request->giaban);
                                  }
                                  else {
                                     $link='img/img_sp/bitis/nu';
                                     $urlhinh=$url.$link.$dau.$tenhinh;
                                     $file->move($link,$tenhinh);
                                      updatekho($request->masp, $request->loaisanpham,$request->tensanpham,
                                              $request->mausac,$request->giagoc,$request->soluong,$request->size
                                              ,$request->hang,$request->doituong,$ngaynhapkho);
                                      updatesanpham($request->masp,$urlhinh,$request->mota,$request->giaban);
                                  }
                               }
                               return view('pageadmin.chinhsua.thongbaosua',['thongbao'=>$thongbao]);
               }
               else
               {
                      if($request->hang=="nike")
                                {
                                $link='img/img_sp/mu/nike';
                                $urlhinh=$url.$link.$dau.$tenhinh;
                                $file->move($link,$tenhinh);
                                updatekho($request->masp, $request->loaisanpham,$request->tensanpham,
                                          $request->mausac,$request->giagoc,$request->soluong,$request->size
                                          ,$request->hang,$request->doituong,$ngaynhapkho);
                                themdulieusanpham($request->masp,$urlhinh,$request->mota,$request->giaban);
                                }
                              else if($request->hang=="adidas")
                              {
                                $link='img/img_sp/mu/adidas';
                                $urlhinh=$url.$link.$dau.$tenhinh;
                                $file->move($link,$tenhinh);
                                  updatekho($request->masp, $request->loaisanpham,$request->tensanpham,
                                          $request->mausac,$request->giagoc,$request->soluong,$request->size
                                          ,$request->hang,$request->doituong,$ngaynhapkho);
                                 updatesanpham($request->masp,$urlhinh,$request->mota,$request->giaban);
                              }
                              else
                              {
                                $thongbao="Không có sản phẩm nón Bitis";
                              }
                              return view('pageadmin.chinhsua.thongbaosua',['thongbao'=>$thongbao,'masp'=>$request->masp]);
               }
        }  
        else
        {
            $thongbao="Sai định dạng File";
            return view('pageadmin.chinhsua.thongbaosua',['thongbao'=>$thongbao,'masp'=>$request->masp]);
        }   
         
}
    
    public function getXoasanpham($masp){
        $thongtinsanpham = DB::table('kho')->where('masp','=',$masp)->get();
        return view('pageadmin.chinhsua.xoasanpham',['thongtin'=>$thongtinsanpham]);
    }
    public function postXoasanpham($masp,Request $request){
      DB::table('sanpham')->where('masp','=',$request->masp)->delete();
      DB::table('kho')->where('masp','=',$request->masp)->delete();
      return view('pageadmin.chinhsua.thongbaoxoa');
    }
    public function lichsu(){
        return view('pageadmin.lichsu');
    }
#QUAN LY TAI KHOAN NHAN VIEN:
     public function quanlytaikhoannhanvien(){
        $thongtin=DB::table('nhanvien')->get();
        return view('pageadmin.quanlytaikhoannhanvien.quanlytaikhoannhanvien',['thongtin'=>$thongtin]);
    }
      public function getThemnhanvien(){
        return view('pageadmin.quanlytaikhoannhanvien.themnhanvien');
      }
      public function postThemnhanvien(Request $request){
        $count = nhanvien::where('msnv','=',"$request->msnv")->count();
        echo $count;
        if($count==0){
              $nhanvien = new nhanvien();
              $nhanvien->msnv = $request->msnv;
              $nhanvien->hoten = $request->hoten;
              $nhanvien ->diachi = $request->diachi;
              $nhanvien->dienthoai=$request->dienthoai;
              $nhanvien->chucvu= $request->chucvu;
              $nhanvien->luong= $request->luong;
              $ngaythemnhanvien = Carbon::now();
              $nhanvien->ngaythemnhanvien = $ngaythemnhanvien;
              $nhanvien->save();
              return view('pageadmin.quanlytaikhoannhanvien.thongbaothem',['count'=>$count,'thongtin'=>$request]);
        }
        else {
            
              return view('pageadmin.quanlytaikhoannhanvien.thongbaothem',['count'=>$count]);
        } 
      }
      public function getCapnhatnhanvien(){
        return view('pageadmin.quanlytaikhoannhanvien.capnhatnhanvien');
      }

      public function postCapnhatnhanvien(Request $request){
            $msnv=$request->manhanvien;
            $hoten=$request->hoten;
            $diachi=$request->diachi;
            $dienthoai=$request->dienthoai;
            $chucvu=$request->chucvu;
            $luong=$request->luong;
            $ngaycapnhat = Carbon::now();
           DB::table('nhanvien')->where('msnv',$request->manhanvien)->update(['hoten'=>$hoten,'diachi'=>$diachi,'dienthoai'=>$dienthoai,'chucvu'=>$chucvu,'luong'=>$luong,'ngaycapnhat'=>$ngaycapnhat]);
            return view('pageadmin.quanlytaikhoannhanvien.thongbaocapnhat',['thongbaocapnhat'=>$request]);
      }
      public function getXoanhanvien(){
        return view('pageadmin.quanlytaikhoannhanvien.xoanhanvien');
      }
      public function postXoanhanvien(Request $request){
        $manhanvien = $request->manhanvien;
       DB::table('nhanvien')->where(['msnv'=>$manhanvien])->delete();
        return view('pageadmin.quanlytaikhoannhanvien.thongbaoxoa',['thongbaoxoa'=>$request]);
      }
      public function getTimkiemnhanvien(){
        return view('pageadmin.quanlytaikhoannhanvien.timkiemnhanvien');
      }
      public function postTimkiemnhanvien(Request $request){

      }
#CÀI ĐẶT: 
      public function getThaydoitaikhoan(){
        return view('pageadmin.caidat.thaydoitaikhoan');
      }
      public function postThaydoitaikhoan(Request $request){
        $taikhoan = $request->taikhoan;
        $matkhau = $request->matkhau;
        $matkhaumoi = $request->matkhaumoi;
        $nlmatkhaumoi = $request->nlmatkhaumoi;
        $ngaythaydoi = Carbon::now();
      $thongtin=DB::table('user')->where('taikhoan','=',$taikhoan)->get();
      if(empty($thongtin)){
        $thongbao = "Bạn đã nhập sai tài khoản";
        return view('pageadmin.caidat.thongbaothaydoi',['thongbao'=>$thongbao]);
      }
      else{
        foreach ($thongtin as $key) {
        if($key->matkhau==$matkhau){
            $thongbao="Đã thay đổi thành công";
            DB::table('user')->where('taikhoan','=',$taikhoan)->update(['matkhau'=>$matkhaumoi,'ngaythaydoi'=>$ngaythaydoi]);
            return view('pageadmin.caidat.thongbaothaydoi',['thongbao'=>$thongbao]);
        }
        else{
            $thongbao ="Bạn đã nhập sai mật khẩu cũ";
            return view('pageadmin.caidat.thongbaothaydoi',['thongbao'=>$thongbao]);
        }
      }
   }
      }
      public function getThemtaikhoan(){
        return view('pageadmin.caidat.themnhanvien');
      }
      public function postThemtaikhoan(Request $request){
        $thongtin = new taikhoan();
        $kiemtra=DB::table('user')->where('taikhoan','=',$request->taikhoan)->get();
        if(empty($kiemtra)){
        $thongtin->taikhoan = $request->taikhoan;
        $thongtin->email = $request->email;
        $thongtin->matkhau = $request->matkhau;
        $thongtin->ngaysinh = $request->ngaysinh;
        $thongtin->dienthoaididong = $request->didong;
        $thongtin->ngaytao = Carbon::now();
        $thongtin->save();
        $thongbao = "Đã tạo thành công tài khoản với tên: ".$request->taikhoan;
         return view('pageadmin.caidat.thongbaothem',['thongbao'=>$thongbao]);
        }
        else {
          $thongbao = "Đã tồn tài tại khoản này rồi!";
          return view('pageadmin.caidat.thongbaothem',['thongbao'=>$thongbao]);
        }
      }
# QUẢN LÝ BÀI VIẾT
    public function getThembaiviet(){
        return view('pageadmin.quanlybaiviet.thembaiviet');
    }
    public function postThembaiviet(Request $request){
      $ngayvietbai = Carbon::now();
      $baiviet = new baiviet();
      $baiviet->tieude = $request->tieude;
      $baiviet->loaibaiviet = $request->loaibaiviet;
      $baiviet->noidung = $request->noidung;
      $baiviet->ngayvietbai = $ngayvietbai;
      $baiviet->save();
      echo "them thanh cong bai viet";
    }
    public function getLichsubaiviet(){
      $thongtin = DB::table('baiviet')->get();
      return view('pageadmin.quanlybaiviet.lichsubaiviet',['thongtin'=>$thongtin]);
    }
    public function getChinhsuabaiviet($mabaiviet){
      //return view('pageadmin.quanlybaiviet.chinhsuabaiviet',['thongtin'=>$thongtin]);
    }
    public function postChinhsuabaiviet(Request $request, $mabaiviet){

    }
    public function getXoabaiviet($mabaiviet){

      return view('pageadmin.quanlybaiviet.xoabaiviet');
    }
    public function postXoabaiviet(Request $request,$mabaiviet){

    }
//THỐNG KÊ: 
    public function thongkethunhap(){
            //Lấy giá trị cho Pagechinh
      $thang = Carbon::now();
      $tiensanpham= DB::table('cthd')->whereMonth('ngaybanhang','=',$thang->month)->sum('tiensanpham');
      $phiship_kh = DB::table('cthd')->whereMonth('ngaybanhang','=',$thang->month)->sum('phiship');
      $tienmatbang = DB::table('chiphikhac')->whereMonth('ngay','=',$thang->month)->sum('tienmatbang');
      $diennuoc = DB::table('chiphikhac')->whereMonth('ngay','=',$thang->month)->sum('diennuoc');
      $phiship_ct = ($phiship_kh*90)/100;
      $phatsinh = DB::table('chiphikhac')->whereMonth('ngay','=',$thang->month)->sum('phatsinh');
      $doanhso =number_format($tiensanpham + $phiship_kh - $diennuoc - $phiship_ct - $phatsinh);
        //Lay gia tri cho bieu do thống kê doanh sô
      $tiensanpham1 = array();
      $phiship_kh1 = array();
      $tienmatbang1 = array();
      $diennuoc1 = array();
      $phiship_ct1= array();
      $phatsinh1 = array();
      $doanhso_tt1 = array();
      for ($i=1; $i <=12 ; $i++) { 
        $tiensanpham1[$i]=DB::table('cthd')->whereMonth('ngaybanhang','=',"$i")->sum('tiensanpham');
        $phiship_kh1[$i]=DB::table('cthd')->whereMonth('ngaybanhang','=',"$i")->sum('phiship');
        $tienmatbang1[$i]=DB::table('chiphikhac')->whereMonth('ngay','=',"$i")->sum('tienmatbang');
        $diennuoc1[$i]=DB::table('chiphikhac')->whereMonth('ngay','=',"$i")->sum('diennuoc');
        $phiship_ct1[$i]=($phiship_kh1[$i]*90)/100;
        $phatsinh1[$i]=DB::table('chiphikhac')->whereMonth('ngay','=',"$i")->sum('phatsinh');
        $doanhso_tt1[$i]=($tiensanpham1[$i]+$phiship_kh1[$i]-$diennuoc1[$i]-$phiship_ct1[$i]-$phatsinh1[$i])/1000000;
      }
      //Lấy giá trị cho biểu đồ thống kê khu vực có doanh số cao nhất
        $doanhso_tinh = DB::table('khachhang')->join('cthd','khachhang.makh','=','cthd.makh')->join('province','khachhang.provinceid','=','province.provinceid')->groupBy('name_province')->limit(2)->get();
        var_dump($doanhso_tinh);
      foreach ($doanhso_tinh as $key) {
        echo $key->tiensanpham;
      }
      //Trả về giá trị cho trang thống kê
   //return view('pageadmin.thongke.thongkethunhap',['doanhso'=>$doanhso,'$diennuoc'=>$diennuoc,'phiship_kh'=>$phiship_kh,'phiship_ct'=>$phiship_ct,'phatsinh'=>$phatsinh,'doanhso_tt1'=>$doanhso_tt1]);
   
    }

    public function thongketienluongnhanvien(){

    }

    public function baocao (){

    }
   
}
