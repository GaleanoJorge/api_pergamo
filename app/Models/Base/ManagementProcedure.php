<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ServicesBriefcase;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ManagementProcedure
 
 * 
 * @property int $id
 * @property int $management_plan_id
 * @property int $procedure_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ManagementProcedure extends Model
{
	protected $table = 'management_procedure';

	public function services_briefcase()
	{
		return $this->belongsTo(ServicesBriefcase::class,'procedure_id');
	}
	
}
