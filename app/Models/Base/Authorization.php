<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AuthStatus;
use App\Models\Procedure;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Authorization
 * 
 * @property int $id
 * @property int $procedure_id
 * @property int $admissions_id
 * @property int $auth_number
 * @property int $state_auth_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @package App\Models\Base
 */
class Authorization extends Model
{
	protected $table = 'authorization';

	public function users()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}

	public function location()
	{
		return $this->hasMany(Location::class);
	}

	public function identification_type()
	{
		return $this->belongsTo(IdentificationType::class);
	}

	public function procedure()
	{
		return $this->belongsTo(Procedure::class, 'procedure_id', 'id');
	}

	public function auth_status()
	{
		return $this->belongsTo(AuthStatus::class);
	}

	public function admissions()
	{
		return $this->belongsTo(Admissions::class);
	}
}
