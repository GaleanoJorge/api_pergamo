<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Diagnosis;
use App\Models\ChDiagnosis;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
/**
 * Class ChPatientExit
 
 * 
 * @property int $id
 * @property string $exit_status
 * @property string $legal_medicine_transfer
 * @property string $date_time
 * @property unsignedBigInteger $death_diagnosis_id
 * @property string $medical_signature
 * @property string $death_certificate_number
 * @property unsignedBigInteger $ch_diagnosis_id
 * @property unsignedBigInteger $exit_diagnosis_id
 * @property unsignedBigInteger $relations_diagnosis_id
 * @property unsignedBigInteger $reason_exit_id
 * @property unsignedBigInteger $type_record_id
 * @property unsignedBigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChPatientExit extends Model
{
	protected $table = 'ch_patient_exit';

	public function death_diagnosis()
	{
		return $this->belongsTo(Diagnosis::class);
	}
	public function exit_diagnosis()
	{
		return $this->belongsTo(Diagnosis::class);
	}
	public function relations_diagnosis()
	{
		return $this->belongsTo(Diagnosis::class);
	}
	public function ch_diagnosis()
	{
		return $this->belongsTo(ChDiagnosis::class);
	}
	public function reason_exit()
	{
		return $this->belongsTo(ReasonExit::class);
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
