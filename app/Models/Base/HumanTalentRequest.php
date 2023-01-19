<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\Admissions;
use App\Models\ManagementPlan;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HumanTalentRequest
 * 
 * @property int $id
 * @property int $admissions_id
 * @property int $management_plan_id
 * @property string $observation
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class HumanTalentRequest extends Model
{
	protected $table = 'human_talent_request';


	public function admissions()
	{
		return $this->belongsTo(Admissions::class);
	}

	public function management_plan()
	{
		return $this->belongsTo(ManagementPlan::class);
	}
}
