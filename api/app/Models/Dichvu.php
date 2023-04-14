<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Dichvu
 * 
 * @property int $DV_ID
 * @property string|null $DV_TENDV
 * 
 * @property Collection|KhDv[] $kh_dvs
 * @property Collection|Phieubaohong[] $phieubaohongs
 *
 * @package App\Models
 */
class Dichvu extends Model
{
	protected $table = 'dichvu';
	protected $primaryKey = 'DV_ID';
	public $timestamps = false;

	protected $fillable = [
		'DV_TENDV'
	];

	public function kh_dvs()
	{
		return $this->hasMany(KhDv::class, 'DV_ID');
	}

	public function phieubaohongs()
	{
		return $this->hasMany(Phieubaohong::class, 'DV_ID');
	}
}
