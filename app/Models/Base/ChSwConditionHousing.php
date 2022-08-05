<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChRecord;
use App\Models\ChTypeRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bed
 * 
 * @property int $id
 * @property string $water
 * @property string $light
 * @property string $telephone
 * @property string $sewerage
 * @property string $gas
 * @property int num_rooms
 * @property int persons_rooms
 * @property string rooms
 * @property string living_room
 * @property string dinning_room
 * @property string kitchen
 * @property string bath
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 * 
 *
 * @package App\Models\Base
 */
class ChSwConditionHousing extends Model
{
	protected $table = 'ch_sw_condition_housing';


	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
