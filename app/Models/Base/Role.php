<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Category;
use App\Models\Item;
use App\Models\Log;
use App\Models\LogLogin;
use App\Models\RoleType;
use App\Models\Permission;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $id
 * @property int $status_id
 * @property int $role_type_id
 * @property string $name
 * @property int $sga_origin_fk
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Status $status
 * @property Collection|Item[] $items
 * @property Collection|Permission[] $permissions
 * @property Collection|LogLogin[] $log_logins
 * @property Collection|Log[] $logs
 * @property Collection|Category[] $categories
 * @property Collection|User[] $users
 *
 * @package App\Models\Base
 */
class Role extends Model
{
	protected $table = 'role';

	protected $casts = [
		'status_id' => 'int',
		'sga_origin_fk' => 'int'
	];

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function role_type()
	{
		return $this->belongsTo(RoleType::class);
	}

	public function items()
	{
		return $this->belongsToMany(Item::class, 'item_role_permission')
					->withPivot('id', 'permission_id')
					->withTimestamps();
	}

	public function permissions()
	{
		return $this->belongsToMany(Permission::class, 'item_role_permission')
					->withPivot('id', 'item_id')
					->withTimestamps();
	}

	public function log_logins()
	{
		return $this->hasMany(LogLogin::class);
	}

	public function logs()
	{
		return $this->hasMany(Log::class);
	}

	public function categories()
	{
		return $this->belongsToMany(Category::class, 'role_category')
					->withPivot('id')
					->withTimestamps();
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'user_role')
					->withPivot('id', 'sga_origin_fk')
					->withTimestamps();
	}
}
