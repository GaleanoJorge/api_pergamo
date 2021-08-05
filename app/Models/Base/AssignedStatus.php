<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\UserAssignSurvey;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AssignedStatus
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|UserAssignSurvey[] $user_assign_surveys
 *
 * @package App\Models\Base
 */
class AssignedStatus extends Model
{
	protected $table = 'assigned_status';

	public function user_assign_surveys()
	{
		return $this->hasMany(UserAssignSurvey::class);
	}
}
