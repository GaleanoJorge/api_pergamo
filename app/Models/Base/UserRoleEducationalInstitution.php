<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\EducationalInstitution;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRoleEducationalInstitution
 * 
 * @property int $id
 * @property int $user_role_id
 * @property int $educational_institution_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property EducationalInstitution $educational_institution
 * @property UserRole $user_role
 *
 * @package App\Models\Base
 */
class UserRoleEducationalInstitution extends Model
{
	protected $table = 'user_role_educational_institution';

	protected $casts = [
		'user_role_id' => 'int',
		'educational_institution_id' => 'int'
	];

	public function educational_institution()
	{
		return $this->belongsTo(EducationalInstitution::class);
	}

	public function user_role()
	{
		return $this->belongsTo(UserRole::class);
	}
}
