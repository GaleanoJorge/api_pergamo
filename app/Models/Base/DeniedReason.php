<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DeniedReason
 * 
 * @property int $id
 * @property string $name
 * @property int $denied_type_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models\Base
 */
class DeniedReason extends Model
{
	protected $table = 'denied_reason';
}
