<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\NursingCarePlan;
use App\Models\NursingProcedure;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdministrationRoute
 
 * 
 * @property int $id
 * @property int $nursing_procedure_id
 * @property string $observation
 * @property int $type_record_id
 * @property int $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChNursingProcedure extends Model
{
	protected $table = 'ch_nursing_procedure';

	public function nursing_procedure()
	{
		return $this->belongsTo(NursingProcedure::class, 'nursing_procedure_id');
	}
}
