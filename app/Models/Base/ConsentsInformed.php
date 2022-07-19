<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\TypeConsents;
use App\Models\Admissions;
use App\Models\User;
use App\Models\ServicesBriefcase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ConsentsInformed
 * 
 * @property int $id
 * @property int $admissions_id
 * @property string $firm_patiend
 * @property string $firm_responsible
 * @property int $assigned_user_id
 * @property int $type_consents_id
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
	}
	// public function role_attention()
	// {
	// 	return $this->hasOneThrough(
	// 		RoleAttention::class,
	// 		TypeOfAttention::class,
	// 		'type_of_attention_id',
	// 	);
	// }

