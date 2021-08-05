<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Course;
use App\Models\CustomFieldType;
use App\Models\EducationalInstitution;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomField
 * 
 * @property int $id
 * @property int $custom_field_type_id
 * @property string $key
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property CustomFieldType $custom_field_type
 * @property Collection|Course[] $courses
 * @property Collection|EducationalInstitution[] $educational_institutions
 * @property Collection|UserRole[] $user_roles
 *
 * @package App\Models\Base
 */
class CustomField extends Model
{
	protected $table = 'custom_field';

	protected $casts = [
		'custom_field_type_id' => 'int'
	];

	public function custom_field_type()
	{
		return $this->belongsTo(CustomFieldType::class);
	}

	public function courses()
	{
		return $this->belongsToMany(Course::class, 'custom_field_course')
					->withPivot('id', 'value')
					->withTimestamps();
	}

	public function educational_institutions()
	{
		return $this->belongsToMany(EducationalInstitution::class)
					->withPivot('id', 'value')
					->withTimestamps();
	}

	public function user_roles()
	{
		return $this->belongsToMany(UserRole::class)
					->withPivot('id', 'value')
					->withTimestamps();
	}
}
