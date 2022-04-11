<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AuthStatus
 * 
 * @property int $id
 * @property string $name
 * @property string $code
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @package App\Models\Base
 */
class AuthStatus extends Model
{
	protected $table = 'auth_status';
}
