<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KhDv
 * 
 * @property int $DV_ID
 * @property int $KH_ID
 * @property Carbon|null $HD_NGAYLAP
 * @property string|null $HD_TRANGTHAICUOC
 * 
 * @property Dichvu $dichvu
 * @property Khachhang $khachhang
 *
 * @package App\Models
 */
class KhDv extends Model
{
	protected $table = 'kh_dv';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'DV_ID' => 'int',
		'KH_ID' => 'int',
		'HD_NGAYLAP' => 'datetime'
	];

	protected $fillable = [
		'HD_NGAYLAP',
		'HD_TRANGTHAICUOC'
	];

	public function dichvu()
	{
		return $this->belongsTo(Dichvu::class, 'DV_ID');
	}

	public function khachhang()
	{
		return $this->belongsTo(Khachhang::class, 'KH_ID');
	}
}
