<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Course;
use App\Models\CustomField;
use App\Models\EducationalInstitutionType;
use App\Models\InstitutionMac;
use App\Models\LogsSync;
use App\Models\Municipality;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EducationalInstitution
 * 
 * @property int $id
 * @property int $municipality_id
 * @property int $educational_institution_type_id
 * @property int $parent_id
 * @property string $name
 * @property string $latitude
 * @property string $longitude
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property EducationalInstitutionType $educational_institution_type
 * @property Municipality $municipality
 * @property EducationalInstitution $educational_institution
 * @property Collection|Course[] $courses
 * @property Collection|CustomField[] $custom_fields
 * @property Collection|EducationalInstitution[] $educational_institutions
 * @property Collection|InstitutionMac[] $institution_macs
 * @property Collection|LogsSync[] $logs_syncs
 * @property Collection|UserRole[] $user_roles
 *
 * @package App\Models\Base
 */
class EducationalInstitution extends Model
{
	protected $table = 'educational_institution';

	protected $casts = [
		'municipality_id' => 'int',
		'educational_institution_type_id' => 'int',
		'parent_id' => 'int'
	];

	public function educational_institution_type()
	{
		return $this->belongsTo(EducationalInstitutionType::class);
	}

	public function municipality()
	{
		return $this->belongsTo(Municipality::class);
	}

	public function educational_institution()
	{
		return $this->belongsTo(EducationalInstitution::class, 'parent_id');
	}

	public function courses()
	{
		return $this->belongsToMany(Course::class)
			->withPivot('id')
			->withTimestamps();
	}

	public function custom_fields()
	{
		return $this->belongsToMany(CustomField::class)
			->withPivot('id', 'value')
			->withTimestamps();
	}

	public function educational_institutions()
	{
		return $this->hasMany(EducationalInstitution::class, 'parent_id');
	}

	public function institution_macs()
	{
		return $this->hasMany(InstitutionMac::class);
	}

	public function logs_syncs()
	{
		return $this->hasMany(LogsSync::class);
	}

	public function user_roles()
	{
		return $this->belongsToMany(UserRole::class, 'user_role_educational_institution')
			->withPivot('id')
			->withTimestamps();
	}
}
