<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Category;
use App\Models\InscriptionStatus;
use App\Models\SessionInscription;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRoleCategoryInscription
 * 
 * @property int $id
 * @property int $user_role_id
 * @property int $category_id
 * @property int $inscription_status_id
 * @property bool $is_extraordinary
 * @property string $observation
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Category $category
 * @property InscriptionStatus $inscription_status
 * @property UserRole $user_role
 * @property Collection|SessionInscription[] $session_inscriptions
 *
 * @package App\Models\Base
 */
class UserRoleCategoryInscription extends Model
{
	protected $table = 'user_role_category_inscription';

	protected $casts = [
		'user_role_id' => 'int',
		'category_id' => 'int',
		'inscription_status_id' => 'int',
		'is_extraordinary' => 'bool'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function inscription_status()
	{
		return $this->belongsTo(InscriptionStatus::class);
	}

	public function user_role()
	{
		return $this->belongsTo(UserRole::class);
	}

	public function session_inscriptions()
	{
		return $this->hasMany(SessionInscription::class);
	}
}
