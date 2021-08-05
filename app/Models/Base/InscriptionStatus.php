<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\UserRoleCategoryInscription;
use App\Models\UserRoleCourse;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InscriptionStatus
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|UserRoleCategoryInscription[] $user_role_category_inscriptions
 * @property Collection|UserRoleCourse[] $user_role_courses
 *
 * @package App\Models\Base
 */
class InscriptionStatus extends Model
{
	protected $table = 'inscription_status';

	public function user_role_category_inscriptions()
	{
		return $this->hasMany(UserRoleCategoryInscription::class);
	}

	public function user_role_courses()
	{
		return $this->hasMany(UserRoleCourse::class);
	}
}
