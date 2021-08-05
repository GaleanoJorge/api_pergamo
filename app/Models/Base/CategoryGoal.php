<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Category;
use App\Models\Goal;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoryGoal
 * 
 * @property int $id
 * @property int $category_id
 * @property int $goal_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Category $category
 * @property Goal $goal
 *
 * @package App\Models\Base
 */
class CategoryGoal extends Model
{
	protected $table = 'category_goal';

	protected $casts = [
		'category_id' => 'int',
		'goal_id' => 'int'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function goal()
	{
		return $this->belongsTo(Goal::class);
	}
}
