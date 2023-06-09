<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dichvu as MDichvu;
use App\Models\KhDv as MKhDv;
use App\Models\KhachHang as MKhachHang;
use App\Models\Nhanvien as MNhanvien;

use Illuminate\Support\Facades\DB;
class DichVu extends Controller
{
    public function geDanhSachDichVu(){
        $dichvus = MDichvu::all();
            return response()->json([
                'status'=>200,
                'data'=>$dichvus
            ]);
    }
    public function getDSDichVuBySdtKhachHang($sdt){
        $khachhang = MKhachHang::where('KH_SDT', $sdt)->first();
        if(!$khachhang){
            return response()->json([
                'status'=>500,
                'mess'=>"Đã xảy ra lỗi"
            ]);
        }
        $dichvu =  DB::table('kh_dv')->select("kh_dv.DV_ID","kh_dv.KH_ID","dichvu.DV_TENDV")
        ->leftJoin('dichvu', 'kh_dv.DV_ID', '=', 'dichvu.DV_ID')
        ->where('kh_dv.KH_ID', $khachhang->KH_ID)
        ->get();
        return response()->json([
            'status'=>200,
            'data'=>$dichvu
        ]);
    }
}
