<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bed
 * 
 * @property int $id
 * @property string $name

 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 * 
 *
 * @package App\Models\Base
 */
class ChSwOccupationalActivities extends Model
{
	protected $table = 'ch_sw_occupational_activities';

	public function ch_sw_occupational_history()
	{
		return $this->belongsTo(ChSwOccupationalHistory::class);
	}
	public function ch_sw_activiy()
	{
		return $this->belongsTo(ChSwActivity::class);
	}
}
