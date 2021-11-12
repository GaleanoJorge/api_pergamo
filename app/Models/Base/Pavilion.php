<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pavilion
 * 
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $bed_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Pavilion extends Model
{
	protected $table = 'pavilion';

	
}
