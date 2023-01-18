<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;


use App\Models\Admissions;
use App\Models\AssignedManagementPlan;
use App\Models\ChInterconsultation;
use App\Models\RoleAttention;
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChRecord
 * 
 * @property int $id
 * @property string $status
 * @property date $date_attention
 * @property string $firm_file
 * @property BigInteger $admissions_id
 * @property BigInteger $user_id
 * @property BigInteger $ch_type_id
 * @property BigInteger $ch_interconsultation_id
 * @property date $date_finish
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChRecord extends Model
{
	protected $table = 'ch_record';

	public function admissions()
	{
		return $this->belongsTo(Admissions::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function assigned_management_plan()
	{
		return $this->belongsTo(AssignedManagementPlan::class);
	}
	public function role_attention()
	{
		return $this->belongsTo(RoleAttention::class, 'type_of_attention_id');
	}
	public function ch_interconsultation()
	{
		return $this->belongsTo(ChInterconsultation::class, 'ch_interconsultation_id');
	}
	public function ch_type()
	{
		return $this->belongsTo(ChType::class, 'ch_type_id');
	}
	public function ChRespiratoryTherapy()
	{
		return $this->hasMany(ChRespiratoryTherapy::class, 'ch_record_id', 'id');
	}
	public function ChBackground()
	{
		return $this->hasMany(ChBackground::class, 'ch_record_id','id');
	}
	public function ChGynecologists()
	{
		return $this->hasMany(ChGynecologists::class, 'ch_record_id','id');
	}
	public function ChVitalSigns()
	{
		return $this->hasMany(ChVitalSigns::class, 'ch_record_id','id');
	}
	public function ChOxygenTherapy()
	{
		return $this->hasMany(ChOxygenTherapy::class, 'ch_record_id','id');
	}
	public function  ChTherapeuticAss()
	{
		return $this->hasMany( ChTherapeuticAss::class, 'ch_record_id','id');
	}
	public function  ChAssSigns()
	{
		return $this->hasMany( ChAssSigns::class, 'ch_record_id','id');
	}
	public function  ChRtInspection()
	{
		return $this->hasMany( ChRtInspection::class, 'ch_record_id','id');
	}
	public function  ChScalePain()
	{
		return $this->hasMany( ChScalePain::class, 'ch_record_id','id');
	}
	public function  ChScaleWongBaker()
	{
		return $this->hasMany( ChScaleWongBaker::class, 'ch_record_id','id');
	}
	public function  ChAuscultation()
	{
		return $this->hasMany( ChAuscultation::class, 'ch_record_id','id');
	}
	public function  ChDiagnosticAids()
	{
		return $this->hasMany( ChDiagnosticAids::class, 'ch_record_id','id');
	}
	public function  ChObjectivesTherapy()
	{
		return $this->hasMany( ChObjectivesTherapy::class, 'ch_record_id','id');
	}
	// public function  PharmacyProductRequest()
	// {
	// 	return $this->hasMany( PharmacyProductRequest::class, 'ch_record_id','id');
	// }
	public function ChRtSessions()
	{
		return $this->hasMany(ChRtSessions::class, 'ch_record_id','id');
	}
	public function ChPsIntervention()
	{
		return $this->hasMany(ChPsIntervention::class, 'ch_record_id','id');
	}
	public function ChRecommendationsEvo()
	{
		return $this->hasMany(ChRecommendationsEvo::class, 'ch_record_id','id');
	}
	public function Disclaimer()
	{
		return $this->hasMany(Disclaimer::class, 'ch_record_id','id');
	}

}
