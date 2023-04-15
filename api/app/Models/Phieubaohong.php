<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Phieubaohong
 * 
 * @property int $PBH_ID
 * @property int|null $KH_ID
 * @property int|null $DV_ID
 * @property string|null $PBH_TRANGTHAI
 * @property string|null $PBH_NOIDUNG
 * @property int|null $PBH_DANHGIA_SAO
 * @property string|null $PBH_DANHGIA_LOINHAN
 * @property Carbon|null $PBH_TG_TAOPHIEU
 * @property Carbon|null $PBH_TG_NHANPHIEU
 * @property Carbon|null $PBH_TG_CHUYENKYTHUAT
 * @property Carbon|null $PBH_TG_HOANTHANH
 * 
 * @property Khachhang|null $khachhang
 * @property Dichvu|null $dichvu
 * @property Collection|QuanlyPhieubh[] $quanly_phieubhs
 *
 * @package App\Models
 */
class Phieubaohong extends Model
{
	protected $table = 'phieubaohong';
	protected $primaryKey = 'PBH_ID';
	public $timestamps = false;

	protected $casts = [
		'KH_ID' => 'int',
		'DV_ID' => 'int',
		'PBH_DANHGIA_SAO' => 'int',
		'PBH_TG_TAOPHIEU' => 'datetime',
		'PBH_TG_NHANPHIEU' => 'datetime',
		'PBH_TG_CHUYENKYTHUAT' => 'datetime',
		'PBH_TG_HOANTHANH' => 'datetime'
	];

	protected $fillable = [
		'KH_ID',
		'DV_ID',
		'PBH_TRANGTHAI',
		'PBH_NOIDUNG',
		'PBH_DANHGIA_SAO',
		'PBH_DANHGIA_LOINHAN',
		'PBH_TG_TAOPHIEU',
		'PBH_TG_NHANPHIEU',
		'PBH_TG_CHUYENKYTHUAT',
		'PBH_TG_HOANTHANH',
		'ID_NV_XU_LY',
		'ID_NV_TIEP_NHAN'
	];

	public function khachhang()
	{
		return $this->belongsTo(Khachhang::class, 'KH_ID');
	}

	public function dichvu()
	{
		return $this->belongsTo(Dichvu::class, 'DV_ID');
	}

	public function quanly_phieubhs()
	{
		return $this->hasMany(QuanlyPhieubh::class, 'PBH_ID');
	}
}
