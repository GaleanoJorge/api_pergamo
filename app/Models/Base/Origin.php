<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\CategoriesOrigin;
use App\Models\Course;
use App\Models\Event;
use App\Models\SurveyInstance;
use App\Models\User;
use App\Models\Validity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Origin
 * 
 * @property int $id
 * @property string $name
 * @property int $validity_id
 * @property int $user_id
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 * @property Validity $validity
 * @property Collection|CategoriesOrigin[] $categories_origins
 * @property Collection|Course[] $courses
 * @property Collection|Event[] $events
 * @property Collection|SurveyInstance[] $survey_instances
 * @property Collection|User[] $users
 *
 * @package App\Models\Base
 */
class Origin extends Model
{
	protected $table = 'origin';

	protected $casts = [
		'validity_id' => 'int',
		'user_id' => 'int'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function validity()
	{
		return $this->belongsTo(Validity::class);
	}

	public function categories_origins()
	{
		return $this->hasMany(CategoriesOrigin::class);
	}

	public function courses()
	{
		return $this->hasMany(Course::class);
	}

	public function events()
	{
		return $this->hasMany(Event::class);
	}

	public function survey_instances()
	{
		return $this->hasMany(SurveyInstance::class);
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'user_origin')
					->withPivot('id')
					->withTimestamps();
	}
}
