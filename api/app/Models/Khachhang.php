<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Khachhang
 * 
 * @property int $KH_ID
 * @property int|null $TK_ID
 * @property string|null $KH_SDT
 * @property string|null $KH_TEN
 * @property string|null $KH_DIACHI
 * @property int|null $KH_TINHTRANG
 * 
 * @property Taikhoan|null $taikhoan
 * @property Collection|KhDv[] $kh_dvs
 * @property Collection|Phieubaohong[] $phieubaohongs
 * @property Collection|Taikhoan[] $taikhoans
 *
 * @package App\Models
 */
class Khachhang extends Model
{
	protected $table = 'khachhang';
	protected $primaryKey = 'KH_ID';
	public $timestamps = false;

	protected $casts = [
		'TK_ID' => 'int',
		'KH_TINHTRANG' => 'int'
	];

	protected $fillable = [
		'TK_ID',
		'KH_SDT',
		'KH_TEN',
		'KH_DIACHI',
		'KH_TINHTRANG'
	];

	public function taikhoan()
	{
		return $this->belongsTo(Taikhoan::class, 'TK_ID');
	}

	public function kh_dvs()
	{
		return $this->hasMany(KhDv::class, 'KH_ID');
	}

	public function phieubaohongs()
	{
		return $this->hasMany(Phieubaohong::class, 'KH_ID');
	}

	public function taikhoans()
	{
		return $this->hasMany(Taikhoan::class, 'KH_ID');
	}
	public function dichvuss(){
        return $this->belongsToMany(Dichvu::class,'kh_dv','KH_ID','DV_ID')->withPivot('HD_NGAYLAP','HD_TRANGTHAICUOC')->using(KhDv::class);
    }
}
