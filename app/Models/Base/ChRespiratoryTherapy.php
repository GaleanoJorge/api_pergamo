<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Diagnosis;
use App\Models\ChBackground;
use App\Models\ChGynecologists;
use App\Models\ChRecord;
use App\Models\ChTypeRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChDiagnosis
 * 
 * @property int $id
 * @property BigInteger $medical_diagnosis_id
 * @property string $therapeutic_diagnosis
 * @property string $reason_consultation
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 * 
 *
 * @package App\Models\Base
 */
class ChRespiratoryTherapy extends Model
{
	protected $table = 'ch_respiratory_therapy';

		public function medical_diagnosis()
	{
		return $this->belongsTo(Diagnosis::class);
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
