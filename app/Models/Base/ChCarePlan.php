<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\NursingCarePlan;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdministrationRoute
 
 * 
 * @property int $id
 * @property int $nursing_care_plan_id
 * @property int $type_record_id
 * @property int $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChCarePlan extends Model
{
	protected $table = 'ch_care_plan';

	public function nursing_care_plan()
	{
		return $this->belongsTo(NursingCarePlan::class, 'nursing_care_plan_id');
	}
}
