<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Dashboard;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DashboardRole
 * 
 * @property int $id
 * @property BigInteger $dashboard_id
 * @property BigInteger $role_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class DashboardRole extends Model
{
	protected $table = 'dashboard_role';

	
	public function dashboard()
	{
		return $this->belongsTo(Dashboard::class);
	}
	public function role()
	{
		return $this->belongsTo(Role::class);
	}
}
