<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\TypeConsents;
use App\Models\Admissions;
use App\Models\ChDiagnosis;
use App\Models\Relationship;
use App\Models\User;
use App\Models\ServicesBriefcase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ConsentsInformed
 * 
 * @property int $id
 * @property int $admissions_id
 * @property string $firm_patient
 * @property string $firm_responsible
 * @property int $assigned_user_id
 * @property int $type_consents_id
 * @property BigInteger $relationship_id
 * @property string $observations
 * @property string $because_patient
 * @property string $because_carer
 * @property string $number_contact
 * @property string $confirmation
 * @property string $dissent
 * @property string $identification_responsible
 * @property string $name_responsible 
 * @property string $parent_responsible 
 * 
 * 
 * 

 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ConsentsInformed extends Model
{
	protected $table = 'consents_informed';

	public function admissions()
	{
		return $this->belongsTo(Admissions::class);
	}
	public function assigned_user()
	{
		return $this->belongsTo(User::class);
	}
	public function type_consents()
	{
		return $this->belongsTo(TypeConsents::class,'type_consents_id');
	}
	public function relationship()
	{
		return $this->belongsTo(Relationship::class);
	}
	public function ch_diagnosis()
	{
		return $this->belongsTo(ChDiagnosis::class);
	}

	}
	// public function role_attention()
	// {
	// 	return $this->hasOneThrough(
	// 		RoleAttention::class,
	// 		TypeOfAttention::class,
	// 		'type_of_attention_id',
	// 	);
	// }

