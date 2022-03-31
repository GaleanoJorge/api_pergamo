<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChDiagnosisClass;
use App\Models\ChDiagnosisType;
use App\Models\Diagnosis;
use App\Models\ChRecord;
use App\Models\ChTypeRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChDiagnosis
 * 
 * @property int $id
 * @property BigInteger $ch_diagnosis_type_id
 * @property BigInteger $ch_diagnosis_class_id
 * @property BigInteger $diagnosis_id
 * @property string $diagnosis_observation 
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 * 
 *
 * @package App\Models\Base
 */
class ChDiagnosis extends Model
{
	protected $table = 'ch_diagnosis';

	public function diagnosis()
	{
		return $this->belongsTo(Diagnosis::class);
	}
	public function ch_diagnosis_class()
	{
		return $this->belongsTo(ChDiagnosisClass::class);
	}
	public function ch_diagnosis_type()
	{
		return $this->belongsTo(ChDiagnosisType::class);
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
