<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phieubaohong as MPhieuBaoHong;
use App\Models\Nhanvien as MNhanvien;

class NhanVien extends Controller
{
    public function getDSPhieuBaoHongBySdtNhanVien($sdt){
        $nhanVien = MNhanvien::where('NV_SDT', $sdt)->first();
        $phieubaohong=MPhieuBaoHong::with('dichvu')->get();
        if($nhanVien){
            return response()->json([
                'status'=>200,
                'data'=>$phieubaohong
            ]);
        }else{
            return response()->json([
                'status'=>200,
                'mess'=>"Không có phiếu"
            ]);
        }

    }
}
