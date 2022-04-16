<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\User;
use App\Models\ManagementPlan;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AssignedManagementPlan
 * 
 * @property int $id
 * @property Carbon $start_date
 * @property Carbon $finish_date
 * @property int $user_id
 * @property Carbon $execution_date
 * @property int $management_plan_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class AssignedManagementPlan extends Model
{
	protected $table = 'assigned_management_plan';

	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function management_plan()
	{
		return $this->belongsTo(ManagementPlan::class, 'management_plan_id');
	}
}
