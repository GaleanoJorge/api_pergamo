<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserActivity
 * 
 * @property int $id
 * @property string $num_activity
 * @property bigInteger $user_id
 * @property bigInteger $procedure_id
 * @property bigInteger $gloss_ambit_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class UserActivity extends Model
{
	protected $table = 'user_activity';

	
}
