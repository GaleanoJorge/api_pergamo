<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\AssistanceSpecial;

/**
 * Class Assistance
 * 
 * @property int $id
 * @property BigInteger $wrong_user_id
 * @property BigInteger $right_user_id
 * @property BigInteger $observation_novelty_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * 
 *
 * @package App\Models\Base
 */
class UserChange extends Model
{
	protected $table = 'user_change';
	
}
