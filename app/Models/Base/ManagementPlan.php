<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AdmissionRoute;
use Carbon\Carbon;
use App\Models\TypeOfAttention;
use App\Models\Frequency;
use App\Models\Admissions;
use App\Models\Authorization;
use App\Models\Briefcase;
use App\Models\Specialty;
use App\Models\User;
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
		return $this->belongsTo(TypeOfAttention::class);
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
	public function authorization()
	{
		return $this->belongsTo(Authorization::class, 'authorization_id');
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
}
