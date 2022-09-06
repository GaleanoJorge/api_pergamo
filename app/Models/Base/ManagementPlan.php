<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AdministrationRoute;
use App\Models\AdmissionRoute;
use Carbon\Carbon;
use App\Models\TypeOfAttention;
use App\Models\Frequency;
use App\Models\Admissions;
use App\Models\AssignedManagementPlan;
use App\Models\Authorization;
use App\Models\Briefcase;
use App\Models\ManagementProcedure;
use App\Models\Procedure;
use App\Models\RoleAttention;
use App\Models\Specialty;
use App\Models\User;
use App\Models\ServicesBriefcase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ManagementPlan
 * 
 * @property int $id
 * @property int $type_of_attention_id
 * @property int $frequency_id
 * @property int $quantity
 * @property int $specialty_id
 * @property int $admissions_id
 * @property int $assigned_user_id
 * @property int $route_of_administration
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ManagementPlan extends Model
{
	protected $table = 'management_plan';

	public function type_of_attention()
	{
		return $this->belongsTo(TypeOfAttention::class,'type_of_attention_id');
	}
	public function route_administration()
	{
		return $this->belongsTo(AdministrationRoute::class,'route_of_administration');
	}
	public function frequency()
	{
		return $this->belongsTo(Frequency::class);
	}
	public function specialty()
	{
		return $this->belongsTo(Specialty::class);
	}
	public function admissions()
	{
		return $this->belongsTo(Admissions::class);
	}
	public function assigned_user()
	{
		return $this->belongsTo(User::class);
	}
	public function service_briefcase()
	{
		return $this->belongsTo(ServicesBriefcase::class,'product_id');
	}
	public function authorization()
	{
		return $this->belongsTo(Authorization::class, 'authorization_id');
	}
	public function procedure()
	{
		return $this->belongsTo(ServicesBriefcase::class, 'procedure_id');
	}
	public function briefcase()
	{
		return $this->hasOneThrough(
			Admissions::class,
			Briefcase::class,
		'briefcase_id',
		'id',
		'id'
	);
	}

	public function assigned_management_plan()
	{
		return $this->hasMany(AssignedManagementPlan::class);
		// return $this->belongsToMany(AssignedManagementPlan::class,'assigned_management_plan')
		// ->withPivot('management_plan_id')
		// ->withTimestamps();
	}
	// public function role_attention()
	// {
	// 	return $this->hasOneThrough(
	// 		RoleAttention::class,
	// 		TypeOfAttention::class,
	// 		'type_of_attention_id',
	// 	);
	// }

	public function management_procedure()
	{
		return $this->hasMany(ManagementProcedure::class);
	}
}
