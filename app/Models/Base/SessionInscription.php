<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Session;
use App\Models\UserRoleCategoryInscription;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SessionInscription
 * 
 * @property int $id
 * @property int $session_id
 * @property int $user_role_category_inscription_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Session $session
 * @property UserRoleCategoryInscription $user_role_category_inscription
 *
 * @package App\Models\Base
 */
class SessionInscription extends Model
{
	protected $table = 'session_inscriptions';

	protected $casts = [
		'session_id' => 'int',
		'user_role_category_inscription_id' => 'int'
	];

	public function session()
	{
		return $this->belongsTo(Session::class);
	}

	public function user_role_category_inscription()
	{
		return $this->belongsTo(UserRoleCategoryInscription::class);
	}
}
