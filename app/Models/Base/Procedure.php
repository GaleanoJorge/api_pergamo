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
 * @property string $code
 * @property string $equivalent
 * @property string $name
 * @property int $procedure_category_id
 * @property int $pbs_type_id
 * @property int $procedure_age_id
 * @property int $gender_id
 * @property int $status_id
 * @property int $procedure_purpose_id
 * @property int $purpose_service_id
 * @property Carbon $time
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
