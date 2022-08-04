<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChSwOccupationalHistory
 * 
 * @property int $id
 * @property string $worked
 * @property string $study
 * @property string $home
 * @property string $none
 * @property BigInteger $ch_sw_occupation_id
 * @property BigInteger $ch_sw_seniority_id
 * @property BigInteger $ch_sw_hours_id
 * @property BigInteger $ch_sw_turn_id
 * @property string $observations 
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChSwOccupationalHistory extends Model
{
	protected $table = 'ch_sw_occupational_history';

	public function ch_sw_occupation()
	{
		return $this->belongsTo(ChSwOccupation::class);
	}
	public function ch_sw_seniority()
	{
		return $this->belongsTo(ChSwSeniority::class);
	}
	public function ch_sw_hours()
	{
		return $this->belongsTo(ChSwHours::class);
	}
	public function ch_sw_turn()
	{
		return $this->belongsTo(ChSwTurn::class);
	}
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
