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
 * Class TherapeuticGoalsTl
 * 
 * @property int $id
 * @property string $hold_phonoarticulators
 * @property string $strengthen_phonoarticulators
 * @property string $strengthen_tone
 * @property string $favor_process
 * @property string $strengthen_thread
 * @property string $favor_psycholinguistic
 * @property string $increase_processes
 * @property string $strengthen_qualities
 * @property string $strengthen_communication
 * @property string $improve_skills
 * 
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class TherapeuticGoalsTl extends Model
{
	protected $table = 'therapeutic_goals_tl';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}

