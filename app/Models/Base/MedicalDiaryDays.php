<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChRecord;
use App\Models\Contract;
use App\Models\CopayParameters;
use App\Models\Days;
use App\Models\MedicalDiary;
use App\Models\MedicalStatus;
use App\Models\Patient;
use App\Models\ServicesBriefcase;
use App\Models\Relationship;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
 * Class Bank
 
 * 
 * @property int $id
 * @property string $code
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class MedicalDiaryDays extends Model
{
	protected $table = 'medical_diary_days';

	public function days()
	{
		return $this->belongsTo(Days::class);
	}

	public function medical_status()
	{
		return $this->belongsTo(MedicalStatus::class, 'medical_status_id');
	}

	public function patient()
	{
		return $this->belongsTo(Patient::class, 'patient_id')->select(
			'patients.*',
			DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')

		);
	}

	public function contract()
	{
		return $this->belongsTo(Contract::class, 'contract_id');
	}

	public function briefcase()
	{
		return $this->belongsTo(Briefcase::class, 'briefcase_id');
	}

	public function services_briefcase()
	{
		return $this->belongsTo(ServicesBriefcase::class, 'services_briefcase_id');
	}

	public function medical_diary()
	{
		return $this->belongsTo(MedicalDiary::class, 'medical_diary_id');
	}

	public function user_cancel()
	{
		return $this->belongsTo(User::class, 'user_cancel_id');
	}

	public function relationship()
	{
		return $this->belongsTo(Relationship::class, 'relationship_id');
	}

	public function ch_record()
	{
		return $this->hasMany(ChRecord::class);
	}

	public function copay_parameters()
	{
		return $this->belongsTo(
			CopayParameters::class, 
			'copay_id',
			'id'
		);
	}
}
