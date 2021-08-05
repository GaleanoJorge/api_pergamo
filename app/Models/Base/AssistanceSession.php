<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Session;
use App\Models\UserRoleGroup;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AssistanceSession
 * 
 * @property int $id
 * @property int $session_id
 * @property int $user_role_group_id
 * @property Carbon $start_time
 * @property Carbon $closing_time
 * @property Carbon $start_time_night
 * @property Carbon $closing_time_night
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Session $session
 * @property UserRoleGroup $user_role_group
 *
 * @package App\Models\Base
 */
class AssistanceSession extends Model
{
	protected $table = 'assistance_session';

	protected $casts = [
		'session_id' => 'int',
		'user_role_group_id' => 'int'
	];

	protected $dates = [
		'start_time',
		'closing_time',
		'start_time_night',
		'closing_time_night'
	];

	public function session()
	{
		return $this->belongsTo(Session::class);
	}

	public function user_role_group()
	{
		return $this->belongsTo(UserRoleGroup::class);
	}
}
