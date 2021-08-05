<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserUser
 * 
 * @property int $id
 * @property int $user_id
 * @property int $user_parent_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 *
 * @package App\Models\Base
 */
class UserUser extends Model
{
	protected $table = 'user_user';

	protected $casts = [
		'user_id' => 'int',
		'user_parent_id' => 'int'
	];

	public function userParent()
	{
		return $this->belongsTo(User::class, 'user_parent_id');
	}

	public function userChildren()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
	
}
