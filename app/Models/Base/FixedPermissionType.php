<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\FixedType;
use App\Models\Permission;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FixedPermissionType
 * 
 * @property int $id 
 * @property BigInteger $permission_id
 * @property BigInteger $fixed_type_id
 * @property BigInteger $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class FixedPermissionType extends Model
{
	protected $table = 'fixed_permission_type';

	public function permission()
	{
		return $this->belongsTo(Permission::class);
	}

	public function fixed_type()
	{
		return $this->belongsTo(FixedType::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
