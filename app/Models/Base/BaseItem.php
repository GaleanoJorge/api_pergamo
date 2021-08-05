<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Item
 * 
 * @property int $id
 * @property int $item_parent_id
 * @property string $name
 * @property string $route
 * @property string $icon
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Item $item
 * @property Collection|Item[] $items
 * @property Collection|Permission[] $permissions
 * @property Collection|Role[] $roles
 *
 * @package App\Models\Base
 */
class BaseItem extends Model
{
	protected $table = 'item';

	protected $casts = [
		'item_parent_id' => 'int'
	];

	public function item()
	{
		return $this->belongsTo(Item::class, 'item_parent_id');
	}

	public function items()
	{
		return $this->hasMany(Item::class, 'item_parent_id');
	}

	public function itemRolePermission()
	{
		return $this->hasMany(ItemRolePermission::class, 'item_id');
	}

	public function permissions()
	{
		return $this->belongsToMany(Permission::class, 'item_role_permission')
					->withPivot('id', 'role_id')
					->withTimestamps();
	}

	public function roles()
	{
		return $this->belongsToMany(Role::class, 'item_role_permission')
					->withPivot('id', 'permission_id')
					->withTimestamps();
	}
}
