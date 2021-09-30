<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MeasurementUnits
 
 * 
 * @property int $id
 * @property string $code
 * * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class MeasurementUnits extends Model
{
	protected $table = 'measurement_units';

	
}
