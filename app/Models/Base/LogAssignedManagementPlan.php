<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Admissions;
use App\Models\AssignedManagementPlan;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

/**
 * Class LogAssignedManagementPlan
 * 
 * @property int $id
 * @property BigInteger $user_id
 * @property BigInteger $assigned_management_plan_id
 * @property string $status
 * @property string $i_start_date
 * @property string $i_finish_date
 * @property BigInteger $i_user_id
 * @property string $i_start_hour
 * @property string $i_finish_hour
 * @property string $f_start_date
 * @property string $f_finish_date
 * @property BigInteger $f_user_id
 * @property string $f_start_hour
 * @property string $f_finish_hour
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * 
 *
 * @package App\Models\Base
 */
class LogAssignedManagementPlan extends Model
{
	protected $table = 'log_assigned_management_plan';
	
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function i_user()
	{
		return $this->belongsTo(User::class);
	}
	public function f_user()
	{
		return $this->belongsTo(User::class);
	}
		public function assigned_management_plan()
	{
		return $this->belongsTo(AssignedManagementPlan::class);
	}
	
}
