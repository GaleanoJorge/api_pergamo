<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdmissionRoute;
use App\Models\Campus;
use App\Models\TypeBriefcase;
use App\Models\Location;
use App\Models\User;
use App\Models\Program;
use App\Models\Pavilion;
use App\Models\Flat;
use App\Models\Bed;
use App\Models\Briefcase;
use App\Models\Contract;
use App\Models\PacMonitoring;
use App\Models\Patient;
use App\Models\ScopeOfAttention;


/**
 * Class Admissions
 * 
 * @property int $id
 * @property tinyInteger $campus_id
 * @property BigInteger $contract_id
 * @property BigInteger $user_id
 * @property BigInteger $briefcase_id
 * @property BigInteger $regime_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Admissions extends Model
{
	protected $table = 'admissions';

	public function campus()
	{
		return $this->belongsTo(Campus::class);
	}
	public function contract()
	{
		return $this->belongsTo(Contract::class);
	}
	public function patients()
	{
		return $this->belongsTo(Patient::class, 'patient_id', 'id');
	}
	public function briefcase()
	{
		return $this->belongsTo(Briefcase::class, 'briefcase_id');
	}
	public function location()
	{
		return $this->hasMany(Location::class);
	}

	public function pac_monitoring()
	{
		return $this->hasMany(PacMonitoring::class);
	}

	public function reason_consultation()
	{
		return $this->hasMany(ReasonConsultation::class);
	}

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function identification_type()
	{
		return $this->belongsTo(IdentificationType::class);
	}

	public function gender()
	{
		return $this->belongsTo(Gender::class);
	}
	public function regime()
	{
		return $this->belongsTo(TypeBriefcase::class,'regime_id');
	}
}
