<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AuthLog
 * 
 * @property int $id
 * @property int $user_id
 * @property int $authorization_id
 * @property int $current_status_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @package App\Models\Base
 */
class AuthLog extends Model
{
	protected $table = 'auth_log';
}
