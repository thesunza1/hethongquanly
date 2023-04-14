<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Taikhoan
 * 
 * @property int $TK_ID
 * @property int|null $NV_ID
 * @property int|null $KH_ID
 * @property string|null $TK_SDT
 * @property string|null $TK_NHAN
 * @property string|null $TK_LOAI
 * 
 * @property Khachhang|null $khachhang
 * @property Nhanvien|null $nhanvien
 * @property Collection|Khachhang[] $khachhangs
 * @property Collection|Nhanvien[] $nhanviens
 *
 * @package App\Models
 */
class Taikhoan extends Model
{
	protected $table = 'taikhoan';
	protected $primaryKey = 'TK_ID';
	public $timestamps = false;

	protected $casts = [
		'NV_ID' => 'int',
		'KH_ID' => 'int'
	];

	protected $fillable = [
		'NV_ID',
		'KH_ID',
		'TK_SDT',
		'TK_NHAN',
		'TK_LOAI'
	];

	public function khachhang()
	{
		return $this->belongsTo(Khachhang::class, 'KH_ID');
	}

	public function nhanvien()
	{
		return $this->belongsTo(Nhanvien::class, 'NV_ID');
	}

	public function khachhangs()
	{
		return $this->hasMany(Khachhang::class, 'TK_ID');
	}

	public function nhanviens()
	{
		return $this->hasMany(Nhanvien::class, 'TK_ID');
	}
}
