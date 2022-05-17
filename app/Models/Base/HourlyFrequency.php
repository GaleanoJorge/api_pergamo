<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HourlyFrequency
 
 * 
 * @property int $id
 * @property string $name
 * @property int $value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class HourlyFrequency extends Model
{
	protected $table = 'hourly_frequency';

	
}
