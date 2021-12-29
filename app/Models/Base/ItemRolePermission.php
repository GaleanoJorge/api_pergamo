<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Item;
use App\Models\Permission;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ItemRolePermission
 * 
 * @property int $id
 * @property int $item_id
 * @property int $role_id
 * @property array $permission_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Item $item
 * @property Permission $permission
 * @property Role $role
 *
 * @package App\Models\Base
 */
class ItemRolePermission extends Model
{
	protected $table = 'item_role_permission';

	protected $casts = [
		'item_id' => 'int',
		'role_id' => 'int',
		'permission_id',
	];

	public function item()
	{
		return $this->belongsTo(Item::class);
	}

	public function permission()
	{
		return $this->belongsTo(Permission::class);
	}

	public function role()
	{
		return $this->belongsTo(Role::class);
	}
}
