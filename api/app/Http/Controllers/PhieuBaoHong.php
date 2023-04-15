<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Phieubaohong as MPhieuBaoHong;
use App\Models\QuanlyPhieubh as MQuanlyPhieubh;

class PhieuBaoHong extends Controller
{
    public function getDSPhieuBaoHong(Request $id){
        $phieubaohong = MPhieuBaoHong::all();
        return response()->json([
            'status'=>200,
            'data'=>$phieubaohong
        ]);
    }

    public function insert(Request $request){
            $phieubaohong=MphieuBaoHong::create($request->all());
            $phieubaohong->PBH_TRANGTHAI="PHIEU_DANG_DUOC_GUI";
            $phieubaohong->PBH_TG_TAOPHIEU=Carbon::now();
            $phieubaohong->save();
            if($phieubaohong){
                return response()->json([
                    'status'=>200,
                    'data'=>$phieubaohong,
                    'mess'=>"Thêm thành công"
                ]);
            }else{
                return response()->json([
                    'status'=>500,
                    'data'=>null,
                    'mess'=>"Thêm thất bại"
                ]);
            }
    }
    public function update(Request $request){
        $phieubaohong=MphieuBaoHong::find($request->PBH_ID);
        $phieubaohong->KH_ID=$request->KH_ID;
        $phieubaohong->DV_ID=$request->DV_ID;
        $phieubaohong->PBH_TRANGTHAI="PHIEU_DANG_DUOC_GUI";
        $phieubaohong->PBH_NOIDUNG=$request->PBH_NOIDUNG;
        $phieubaohong->PBH_DANHGIA_SAO=$request->PBH_DANHGIA_SAO;
        $phieubaohong->PBH_DANHGIA_LOINHAN=$request->PBH_DANHGIA_LOINHAN;
        $phieubaohong->PBH_TG_TAOPHIEU=$request->PBH_TG_TAOPHIEU;
        $phieubaohong->save();
        if($phieubaohong){
            return response()->json([
                'status'=>200,
                'data'=>$phieubaohong,
                'mess'=>"Cập nhật thành công"
            ]);
        }else{
            return response()->json([
                'status'=>500,
                'data'=>null,
                'mess'=>"Cập nhật thất bại"
            ]);
        }
    }
    public function xacNhan(Request $request){
        $phieubaohong=MphieuBaoHong::find($request->PBH_ID);
        $phieubaohong->PBH_TRANGTHAI="PHIEU_DA_DUOC_TIEP_NHAN";
        $phieubaohong->PBH_TG_NHANPHIEU=Carbon::now();
        $phieubaohong->save();
        if($phieubaohong){
            return response()->json([
                'status'=>200,
                'data'=>$phieubaohong,
                'mess'=>"Xác nhận thành công"
            ]);
        }else{
            return response()->json([
                'status'=>500,
                'data'=>null,
                'mess'=>"Xác nhận thất bại"
            ]);
        }
    }
    public function banGiaoXuLy(Request $request){
        $phieubaohong=MphieuBaoHong::find($request->PBH_ID);
        $phieubaohong->PBH_TRANGTHAI="PHIEU_DA_GIAO_KY_THUAT_XU_LY";
        $quanlyphieu =MQuanlyPhieubh::create();
        $quanlyphieu->NV_ID=$request->NV_ID;
        $quanlyphieu->PBH_ID=$request->PBH_ID;
        $quanlyphieu->QL_NHIEMVU=$request->QL_NHIEMVU;
        $phieubaohong->PBH_TG_CHUYENKYTHUAT=Carbon::now();
        $quanlyphieu->save();
        $phieubaohong->save();
        if($phieubaohong){
            return response()->json([
                'status'=>200,
                'data'=>$phieubaohong,
                'mess'=>"Bàn giao thành công"
            ]);
        }else{
            return response()->json([
                'status'=>200,
                'data'=>null,
                'mess'=>"Bàn giao thất bại"
            ]);
        }
    }
    public function hoanThanh(Request $request){
        $phieubaohong=MphieuBaoHong::find($request->PBH_ID);
        $phieubaohong->PBH_TRANGTHAI="HOAN_THANH";
        $phieubaohong->PBH_TG_HOANTHANH=Carbon::now();
        $phieubaohong->save();
        if($phieubaohong){
            return response()->json([
                'status'=>200,
                'data'=>$phieubaohong,
                'mess'=>"Xác nhận thành công"
            ]);
        }else{
            return response()->json([
                'status'=>200,
                'data'=>null,
                'mess'=>"Xác nhận thất bại"
            ]);
        }
    }
    public function danhGia(Request $request){
        $phieubaohong=MphieuBaoHong::find($request->PBH_ID);
        $phieubaohong->PBH_TRANGTHAI="HOAN_THANH";
        $phieubaohong->PBH_DANHGIA_SAO=$request->PBH_DANHGIA_SAO;
        $phieubaohong->PBH_DANHGIA_LOINHAN=$request->PBH_DANHGIA_LOINHAN;
        $phieubaohong->PBH_TG_HOANTHANH=Carbon::now();
        $phieubaohong->save();
        if($phieubaohong){
            return response()->json([
                'status'=>200,
                'data'=>$phieubaohong,
                'mess'=>"Đánh giá thành công"
            ]);
        }else{
            return response()->json([
                'status'=>200,
                'data'=>null,
                'mess'=>"Đánh giá thất bại"
            ]);
        }
    }
}
