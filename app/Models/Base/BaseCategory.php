<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\Goal;
use App\Models\CategoriesOrigin;
use App\Models\Course;
use App\Models\Origin;
use App\Models\Status;
use App\Models\User;
use App\Models\Area;
use App\Models\Subarea;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Category
 * 
 * @property int $id
 * @property int $category_parent_id
 * @property int $origin_id
 * @property int $status_id
 * @property string $name
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Category $category
 * @property Origin $origin
 * @property Status $status
 * @property Collection|Category[] $categories
 *
 * @package App\Models\Base
 */
class BaseCategory extends Model
{
	protected $table = 'category';

	protected $casts = [
		'category_parent_id' => 'int',
		'origin_id' => 'int',
		'status_id' => 'int'
	];

	public function category()
	{
		return $this->belongsTo(Category::class, 'category_parent_id');
	}

	public function origin()
	{
		return $this->belongsTo(Origin::class);
	}

	public function status()
	{
		return $this->belongsTo(Status::class);
	}
	public function area()
	{
		return $this->belongsTo(Area::class);
	}
	public function subarea()
	{
		return $this->belongsTo(Subarea::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function categories()
	{
		return $this->hasMany(Category::class, 'category_parent_id');
	}

	public function goals()
	{
		return $this->belongsToMany(Goal::class)
			->withPivot('id')
			->withTimestamps();
	}

	public function categories_origin()
	{
		return $this->hasMany(CategoriesOrigin::class);
	}

	public function courses()
	{
		return $this->hasMany(Course::class);
	}
}
