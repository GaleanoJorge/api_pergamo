<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Procedure
 * 
 * @property int $id
 * @property string $prd_code
 * @property string $prd_equivalent
 * @property string $prd_name
 * @property int $prd_category
 * @property int $prd_nopos
 * @property int $prd_age
 * @property int $prd_gender
 * @property int $prd_state
 * @property int $prd_purpose
 * @property Carbon $prd_time
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Procedure extends Model
{
	protected $table = 'procedure';

	
}
