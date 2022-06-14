<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdministrationRoute
 
 * 
 * @property int $id
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class NursingCarePlan extends Model
{
	protected $table = 'nursing_care_plan';

	
}
