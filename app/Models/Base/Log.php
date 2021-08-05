<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Log
 * 
 * @property int $id
 * @property int $user_id
 * @property int $role_id
 * @property Carbon $date
 * @property string $query
 * @property float $time
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Role $role
 * @property User $user
 *
 * @package App\Models\Base
 */
class Log extends Model
{
	protected $table = 'logs';

	protected $casts = [
		'user_id' => 'int',
		'role_id' => 'int',
		'time' => 'float'
	];

	protected $dates = [
		'date'
	];

	public function role()
	{
		return $this->belongsTo(Role::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
