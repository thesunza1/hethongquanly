<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phieubaohong as MPhieuBaoHong;
use App\Models\Nhanvien as MNhanvien;

class NhanVien extends Controller
{
    public function getDSPhieuBaoHongBySdtNhanVien($sdt){
        $nhanVien = MNhanvien::where('NV_SDT', $sdt)->first();
        $phieubaohong=MPhieuBaoHong::with('dichvu','nhanvienkythuat','nhanvientiepnhan')->get();;
        if(!$nhanVien){
            return response()->json([
                'status'=>500,
                'mess'=>"Đã xảy ra lỗi"
            ]);
        }
        return response()->json([
            'status'=>200,
            'data'=>$phieubaohong,
            'thongtinhanvien'=>$nhanVien
        ]);
    }
    public function getDanhSachNhanVienKyThuat(){
        $nhanvienkythuats=MNhanvien::where('NV_NHIEMVU', "XU_LY")->get();
        if($nhanvienkythuats){
            return response()->json([
                'status'=>200,
                'data'=>$nhanvienkythuats
            ]);
        }else{
            return response()->json([
                'status'=>200,
                'mess'=>'Không có nhân viên kỹ thuật nào'
            ]);
        }
    }
    public function getDSPhieuBaoHongBySdtNhanVienKyThuat($sdt){
        $nhanVien = MNhanvien::where('NV_SDT', $sdt)->first();
        $phieubaohong=MPhieuBaoHong::where('ID_NV_XU_LY', $nhanVien->NV_ID)->with('dichvu','nhanvienkythuat','nhanvientiepnhan')->get();;
        if(!$nhanVien){
            return response()->json([
                'status'=>500,
                'mess'=>"Đã xảy ra lỗi"
            ]);
        }
        return response()->json([
            'status'=>200,
            'data'=>$phieubaohong,
            'thongtinhanvien'=>$nhanVien
        ]);
    }
}
