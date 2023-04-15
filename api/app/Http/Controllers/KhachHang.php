<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phieubaohong as MPhieuBaoHong;
use App\Models\KhachHang as MKhachHang;
use \Illuminate\Database\QueryException;
class KhachHang extends Controller
{
    public function getDSBaoHongBySdtKhachHang($sdt){
        $khachhang = MKhachHang::where('KH_SDT', $sdt)->first();
            if(!$khachhang){
                return response()->json([
                    'status'=>500,
                    'mess'=>"Đã xảy ra lỗi"
                ]);
            }
            return response()->json([
                'status'=>200,
                'phieubaohong'=>$khachhang->phieubaohongs()->orderByDesc('PBH_ID')->with('dichvu')->get()
            ]);
    }
}
