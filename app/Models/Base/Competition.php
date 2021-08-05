<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\CompetitionActivity;
use App\Models\Course;
use App\Models\Criterion;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Competition
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|CompetitionActivity[] $competition_activities
 * @property Collection|Course[] $courses
 * @property Collection|Criterion[] $criteria
 *
 * @package App\Models\Base
 */
class Competition extends Model
{
	protected $table = 'competition';

	public function competition_activities()
	{
		return $this->hasMany(CompetitionActivity::class);
	}

	public function courses()
	{
		return $this->belongsToMany(Course::class)
					->withPivot('id')
					->withTimestamps();
	}

	public function criteria()
	{
		return $this->hasMany(Criterion::class);
	}
}
