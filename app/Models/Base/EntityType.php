<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Course;
use App\Models\Event;
use App\Models\Module;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EntityType
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Course[] $courses
 * @property Collection|Event[] $events
 * @property Collection|Module[] $modules
 *
 * @package App\Models\Base
 */
class EntityType extends Model
{
	protected $table = 'entity_type';

	public function courses()
	{
		return $this->hasMany(Course::class);
	}

	public function events()
	{
		return $this->hasMany(Event::class);
	}

	public function modules()
	{
		return $this->hasMany(Module::class);
	}
}
