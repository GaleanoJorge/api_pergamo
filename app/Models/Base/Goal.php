<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Activity;
use App\Models\Category;
use App\Models\Criterion;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Goal
 * 
 * @property int $id
 * @property int $unit_id
 * @property float $value
 * @property string $name
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Unit $unit
 * @property Collection|Category[] $categories
 * @property Collection|Activity[] $activities
 * @property Collection|Criterion[] $criteria
 *
 * @package App\Models\Base
 */
class Goal extends Model
{
	protected $table = 'goal';

	protected $casts = [
		'unit_id' => 'int',
		'value' => 'float'
	];

	public function unit()
	{
		return $this->belongsTo(Unit::class);
	}

	public function categories()
	{
		return $this->belongsToMany(Category::class)
					->withPivot('id')
					->withTimestamps();
	}

	public function activities()
	{
		return $this->belongsToMany(Activity::class, 'criterion_activity_goal')
					->withPivot('id', 'criterion_id')
					->withTimestamps();
	}

	public function criteria()
	{
		return $this->belongsToMany(Criterion::class, 'criterion_activity_goal')
					->withPivot('id', 'activity_id')
					->withTimestamps();
	}
}
