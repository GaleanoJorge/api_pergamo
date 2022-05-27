<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Campus;
use App\Models\FixedAreaCampus;
use App\Models\Flat;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FixedLocationCampus
 * 
 * @property int $id 
 * @property BigInteger $flat_id
 * @property BigInteger $campus_id
 * @property BigInteger $fixed_area_campus_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class FixedLocationCampus extends Model
{
	protected $table = 'fixed_location_campus';

	public function flat()
	{
		return $this->belongsTo(Flat::class);
	}
	public function campus()
	{
		return $this->belongsTo(Campus::class);
	}
	public function fixed_area_campus()
	{
		return $this->belongsTo(FixedAreaCampus::class);
	}
}
