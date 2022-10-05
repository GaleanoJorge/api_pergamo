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
 * Class ChPsObjectives
 * 
 * @property int $id
 * @property string $patient 
 * @property string $session 
 * @property string $intervention 
 * @property string $patient_state 
 * @property string $recommendations 
 * @property string $control 
 * @property string $referrals 
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChPsObjectives extends Model
{
	protected $table = 'ch_ps_objectives';
		
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
