<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Category;
use App\Models\Event;
use App\Models\Origin;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoriesOrigin
 * 
 * @property int $id
 * @property int $origin_id
 * @property int $category_id
 * @property float $planned_budget
 * @property float $allocated_budget
 * @property float $executed_budget
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Category $category
 * @property Origin $origin
 * @property Collection|Event[] $events
 *
 * @package App\Models\Base
 */
class CategoriesOrigin extends Model
{
	protected $table = 'categories_origin';

	protected $casts = [
		'origin_id' => 'int',
		'category_id' => 'int',
		'planned_budget' => 'float',
		'allocated_budget' => 'float',
		'executed_budget' => 'float'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function origin()
	{
		return $this->belongsTo(Origin::class);
	}

	public function events()
	{
		return $this->hasMany(Event::class);
	}
}
