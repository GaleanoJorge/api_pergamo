<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Category;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RoleCategory
 * 
 * @property int $id
 * @property int $category_id
 * @property int $role_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Category $category
 * @property Role $role
 *
 * @package App\Models\Base
 */
class RoleCategory extends Model
{
	protected $table = 'role_category';

	protected $casts = [
		'category_id' => 'int',
		'role_id' => 'int'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function role()
	{
		return $this->belongsTo(Role::class);
	}
}
