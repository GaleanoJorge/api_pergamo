<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Location capacity
 * 
 * @property int $id
 * @property int $assistance_id
 * @property int $locality_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 

 *
 * @package App\Models\Base
 */
class LocationCapacity extends Model
{
	protected $table = 'location_capacity';

}
