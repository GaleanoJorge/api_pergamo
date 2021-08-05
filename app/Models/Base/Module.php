<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Category;
use App\Models\Course;
use App\Models\EntityType;
use App\Models\Session;
use App\Models\Specialtym;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Module
 * 
 * @property int $id
 * @property int $category_id
 * @property int $entity_type_id
 * @property int $specialtym_id
 * @property string $name
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Category $category
 * @property EntityType $entity_type
 * @property Specialtym $specialtym
 * @property Collection|Course[] $courses
 * @property Collection|Session[] $sessions
 *
 * @package App\Models\Base
 */
class Module extends Model
{
	protected $table = 'module';

	protected $casts = [
		'category_id' => 'int',
		'entity_type_id' => 'int',
		'specialtym_id' => 'int'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function entity_type()
	{
		return $this->belongsTo(EntityType::class);
	}

	public function specialtym()
	{
		return $this->belongsTo(Specialtym::class);
	}

	public function courses()
	{
		return $this->belongsToMany(Course::class)
					->withPivot('id')
					->withTimestamps();
	}

	public function sessions()
	{
		return $this->hasMany(Session::class);
	}
}
