<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Circuit;
use App\Models\Dependence;
use App\Models\District;
use App\Models\Entity;
use App\Models\Office;
use App\Models\Position;
use App\Models\Question;
use App\Models\Role;
use App\Models\SectionalCouncil;
use App\Models\Specialty;
use App\Models\Specialtym;
use App\Models\Subarea;
use App\Models\Survey;
use App\Models\SurveyInstance;
use App\Models\Theme;
use App\Models\User;
use App\Models\UserRoleGroup;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Circuit[] $circuits
 * @property Collection|Dependence[] $dependences
 * @property Collection|District[] $districts
 * @property Collection|Entity[] $entities
 * @property Collection|Office[] $offices
 * @property Collection|Position[] $positions
 * @property Collection|Question[] $questions
 * @property Collection|Role[] $roles
 * @property Collection|SectionalCouncil[] $sectional_councils
 * @property Collection|Specialty[] $specialties
 * @property Collection|Specialtym[] $specialtyms
 * @property Collection|Subarea[] $subareas
 * @property Collection|Survey[] $surveys
 * @property Collection|SurveyInstance[] $survey_instances
 * @property Collection|Theme[] $themes
 * @property Collection|UserRoleGroup[] $user_role_groups
 * @property Collection|User[] $users
 *
 * @package App\Models\Base
 */
class Status extends Model
{
	protected $table = 'status';

	public function circuits()
	{
		return $this->hasMany(Circuit::class);
	}

	public function dependences()
	{
		return $this->hasMany(Dependence::class);
	}

	public function districts()
	{
		return $this->hasMany(District::class);
	}

	public function entities()
	{
		return $this->hasMany(Entity::class);
	}

	public function offices()
	{
		return $this->hasMany(Office::class);
	}

	public function positions()
	{
		return $this->hasMany(Position::class);
	}

	public function questions()
	{
		return $this->hasMany(Question::class);
	}

	public function roles()
	{
		return $this->hasMany(Role::class);
	}

	public function sectional_councils()
	{
		return $this->hasMany(SectionalCouncil::class);
	}

	public function specialties()
	{
		return $this->hasMany(Specialty::class);
	}

	public function specialtyms()
	{
		return $this->hasMany(Specialtym::class);
	}

	public function subareas()
	{
		return $this->hasMany(Subarea::class);
	}

	public function surveys()
	{
		return $this->hasMany(Survey::class);
	}

	public function survey_instances()
	{
		return $this->hasMany(SurveyInstance::class);
	}

	public function themes()
	{
		return $this->hasMany(Theme::class);
	}

	public function user_role_groups()
	{
		return $this->hasMany(UserRoleGroup::class);
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
