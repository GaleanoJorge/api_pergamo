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
 * Class ChEDailyActivitiesOT
 * 
 * @property int $id
 * @property string $cook
 * @property string $kids
 * @property string $wash
 * @property string $game
 * @property string $ironing
 * @property string $walk
 * @property string $clean
 * @property string $sport
 * @property string $decorate
 * @property string $social
 * @property string $act_floristry
 * @property string $friends
 * @property string $read
 * @property string $politic
 * @property string $view_tv
 * @property string $religion
 * @property string $write
 * @property string $look
 * @property string $arrange
 * @property string $travel
 * @property string $observation_activity
 * @property string $test
 * @property string $observation_test

 * @property unsignedBigInteger type_record_id 
 * @property unsignedBigInteger ch_record_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChEDailyActivitiesOT extends Model
{
	protected $table = 'ch_e_daily_activities_o_t';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
