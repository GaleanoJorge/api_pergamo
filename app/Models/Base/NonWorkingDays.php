<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NonWorkingDays
 * 
 * @property int $id
 * @property string $description
 * @property Date $day
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models\Base
 */
class NonWorkingDays extends Model
{
	protected $table = 'non_working_days';
}
