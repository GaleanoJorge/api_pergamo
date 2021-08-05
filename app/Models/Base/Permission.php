<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Item;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 * 
 * @property int $id
 * @property string $name
 * @property string $class
 * @property string $icon
 * @property string $action
 * @property bool $is_principal
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Item[] $items
 * @property Collection|Role[] $roles
 *
 * @package App\Models\Base
 */
class Permission extends Model
{
	protected $table = 'permission';

	protected $casts = [
		'is_principal' => 'bool'
	];

	public function items()
	{
		return $this->belongsToMany(Item::class, 'item_role_permission')
					->withPivot('id', 'role_id')
					->withTimestamps();
	}

	public function roles()
	{
		return $this->belongsToMany(Role::class, 'item_role_permission')
					->withPivot('id', 'item_id')
					->withTimestamps();
	}
}
