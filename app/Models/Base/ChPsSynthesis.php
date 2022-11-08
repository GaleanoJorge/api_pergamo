<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChPsIntelligence;
use App\Models\ChPsIntrospection;
use App\Models\ChPsJudgment;
use App\Models\ChPsProspecting;
use App\Models\ChPsPsychomotricity;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChPsSynthesis
 * 
 * @property int $id
 * @property string $observations_psy 
 * @property string $observations_in 
 * @property string $observations_jud 
 * @property string $observations_pros 
 * @property string $observations_inte 
 * @property string $psychomotricity
 * @property string $introspection
 * @property unsignedBigInteger $ch_ps_judgment_id
 * @property unsignedBigInteger $ch_ps_prospecting_id 
 * @property unsignedBigInteger $ch_ps_intelligence_id
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChPsSynthesis extends Model
{
	protected $table = 'ch_ps_synthesis';
	
	public function ch_ps_judgment()
	{
		return $this->belongsTo(ChPsJudgment::class);
	}	
	public function ch_ps_prospecting()
	{
		return $this->belongsTo(ChPsProspecting::class);
	}	
	public function ch_ps_intelligence()
	{
		return $this->belongsTo(ChPsIntelligence::class);
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
