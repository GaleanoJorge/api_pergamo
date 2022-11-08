<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\ManagementPlan;
use App\Models\User;

/**
 * Class LogManagement
 * 
 * @property int $id
 * @property BigInteger $management_plan_id
 * @property BigInteger $user_id
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * 
 *
 * @package App\Models\Base
 */
class LogManagement extends Model
{
	protected $table = 'log_management';

	public function management_plan()
	{
		return $this->belongsTo(ManagementPlan::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
}
