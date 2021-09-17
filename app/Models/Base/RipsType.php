<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RipsType
 * 
 * @property int $id
 * @property string $name
 *  @property BigInteger $rips_typefile_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class RipsType extends Model
{
	protected $table = 'rips_type';

	
}
