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
 * Class ChPsConsciousness
 * 
 * @property int $id
 * @property string $watch 
 * @property string $hypervigilant 
 * @property string $obtundation 
 * @property string $confusion 
 * @property string $delirium 
 * @property string $oneiroid 
 * @property string $twilight 
 * @property string $stupor 
 * @property string $shallow 
 * @property string $deep 
 * @property string $appearance 
 * @property string $attitude 
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChPsConsciousness extends Model
{
	protected $table = 'ch_ps_consciousness';
		
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
