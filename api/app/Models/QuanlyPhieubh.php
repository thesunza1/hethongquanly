<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QuanlyPhieubh
 * 
 * @property int $QL_ID
 * @property int|null $PBH_ID
 * @property int|null $NV_ID
 * @property string|null $QL_NHIEMVU
 * 
 * @property Phieubaohong|null $phieubaohong
 * @property Nhanvien|null $nhanvien
 *
 * @package App\Models
 */
class QuanlyPhieubh extends Model
{
	protected $table = 'quanly_phieubh';
	protected $primaryKey = 'QL_ID';
	public $timestamps = false;

	protected $casts = [
		'PBH_ID' => 'int',
		'NV_ID' => 'int'
	];

	protected $fillable = [
		'PBH_ID',
		'NV_ID',
		'QL_NHIEMVU'
	];

	public function phieubaohong()
	{
		return $this->belongsTo(Phieubaohong::class, 'PBH_ID');
	}

	public function nhanvien()
	{
		return $this->belongsTo(Nhanvien::class, 'NV_ID');
	}
}
