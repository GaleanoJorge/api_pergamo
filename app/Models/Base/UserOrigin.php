<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Origin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserOrigin
 * 
 * @property int $id
 * @property int $user_id
 * @property int $origin_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Origin $origin
 * @property User $user
 *
 * @package App\Models\Base
 */
class UserOrigin extends Model
{
	protected $table = 'user_origin';

	protected $casts = [
		'user_id' => 'int',
		'origin_id' => 'int'
	];

	public function origin()
	{
		return $this->belongsTo(Origin::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
