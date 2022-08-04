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
 * @property string $victim
 * @property string $victim_time
 * @property string $subsidies
 * @property string $detail_subsidies
 * @property BigInteger $municipality_id
 * @property BigInteger $population_group_id
 * @property TinyInteger $ethnicity_id
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 * 
 *
 * @package App\Models\Base
 */
class ChSwArmedConflict extends Model
{
	protected $table = 'ch_sw_armed_conflict';


	public function municipality()
	{
		return $this->belongsTo(Municipality::class);
	}
	public function population_group()
	{
		return $this->belongsTo(PopulationGroup::class);
	}
	public function ethnicity()
	{
		return $this->belongsTo(Ethnicity::class);
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
