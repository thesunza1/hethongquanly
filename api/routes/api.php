<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhieuBaoHong;
use App\Http\Controllers\KhachHang;
use App\Http\Controllers\DichVu;
use App\Http\Controllers\NhanVien;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('DichVu/getDanhSachDichVu', [DichVu::class,'geDanhSachDichVu',]);
Route::get('KhachHang/getDSBaoHongBySdtKhachHang/{sdt}', [KhachHang::class,'getDSBaoHongBySdtKhachHang',]);
Route::get('PhieuBaoHong/danhsachphieu', [PhieuBaoHong::class,'getDSPhieuBaoHong',]);
Route::POST('PhieuBaoHong/insert', [PhieuBaoHong::class,'insert',]);
Route::POST('PhieuBaoHong/update', [PhieuBaoHong::class,'update',]);
Route::POST('PhieuBaoHong/xacNhan', [PhieuBaoHong::class,'xacNhan',]);
Route::POST('PhieuBaoHong/banGiaoXuLy', [PhieuBaoHong::class,'banGiaoXuLy',]);
Route::POST('PhieuBaoHong/hoanThanh', [PhieuBaoHong::class,'hoanThanh',]);
Route::POST('PhieuBaoHong/danhGia', [PhieuBaoHong::class,'danhGia',]);
Route::get('DichVu/getDSDichVuBySdtKhachHang/{sdt}', [DichVu::class,'getDSDichVuBySdtKhachHang',]);
Route::get('NhanVien/getDSPhieuBaoHongBySdtNhanVien/{sdt}', [NhanVien::class,'getDSPhieuBaoHongBySdtNhanVien',]);
Route::get('NhanVien/getDanhSachNhanVienKyThuat', [NhanVien::class,'getDanhSachNhanVienKyThuat',]);
Route::get('NhanVien/getDSPhieuBaoHongBySdtNhanVienKyThuat/{sdt}', [NhanVien::class,'getDSPhieuBaoHongBySdtNhanVienKyThuat',]);



