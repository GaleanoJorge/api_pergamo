<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Campus;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserCampus
 * 
 * @property int $id
 * @property int $user_id
 * @property int $campus_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class UserCampus extends Model
{
	protected $table = 'user_campus';

	public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
	public function campus()
    {
        return $this->belongsTo(Campus::class, 'campus_id');
    }
}
