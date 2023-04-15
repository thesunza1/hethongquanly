<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Nhanvien
 * 
 * @property int $NV_ID
 * @property int|null $TK_ID
 * @property string|null $NV_SDT
 * @property string|null $NV_TEN
 * 
 * @property Taikhoan|null $taikhoan
 * @property Collection|QuanlyPhieubh[] $quanly_phieubhs
 * @property Collection|Taikhoan[] $taikhoans
 *
 * @package App\Models
 */
class Nhanvien extends Model
{
	protected $table = 'nhanvien';
	protected $primaryKey = 'NV_ID';
	public $timestamps = false;

	protected $casts = [
		'TK_ID' => 'int'
	];

	protected $fillable = [
		'TK_ID',
		'NV_SDT',
		'NV_TEN',
		'NV_NHIEMVU'
	];

	public function taikhoan()
	{
		return $this->belongsTo(Taikhoan::class, 'TK_ID');
	}

	public function quanly_phieubhs()
	{
		return $this->hasMany(QuanlyPhieubh::class, 'NV_ID');
	}

	public function taikhoans()
	{
		return $this->hasMany(Taikhoan::class, 'NV_ID');
	}
}
