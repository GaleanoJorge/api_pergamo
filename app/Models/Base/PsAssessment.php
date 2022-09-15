<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;
use App\Models\MaritalStatus;
use App\Models\AcademicLevel;
use App\Models\StudyLevelStatus;
use App\Models\Activities;
use App\Models\Inability;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChSwFamily
 * 
 * @property int $id
 * @property string $partner 
 * @property string $symptom 
 * @property unsignedBigInteger $ch_ps_episodes_id 
 * @property string $episodes_number 
 * @property string $area 
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChSwFamily extends Model
{
	protected $table = 'ch_sw_family';

	public function ch_ps_episodes()
	{
		return $this->belongsTo(ChPsEpisodes::class);
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
