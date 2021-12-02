<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;
use App\Models\Pavilion;
use App\Models\StatusBed;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bed
 * 
 * @property int $id
 * @property string $code
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Bed extends Model
{
	protected $table = 'bed';

	public function pavilion()
	{
		return $this->belongsTo(Pavilion::class);
	}
	public function status_bed()
	{
		return $this->belongsTo(StatusBed::class);
	}
	public function location()
	{
		return $this->hasMany(Location::class);
	}
	
}
