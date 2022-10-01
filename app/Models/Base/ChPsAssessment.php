<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChPsAreas;
use App\Models\Relationship;
use App\Models\ChPsEpisodes;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChPsAssessment
 * 
 * @property int $id
 * @property string $firspatienttname 
 * @property string $symptom 
 * @property int $episodes_number 
 * @property int $areas_id
 * @property unsignedBigInteger $relationship_id 
 * @property unsignedTinyInteger $ch_ps_episodes_id
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChPsAssessment extends Model
{
	protected $table = 'ch_ps_assessment';

	public function relationship()
	{
		return $this->belongsTo(Relationship::class,'relationship_id');
	}
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
