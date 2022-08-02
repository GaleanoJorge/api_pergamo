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
 * Class HumanTalentRequestObservation
 * 
 * @property int $id
 * @property int $category
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class HumanTalentRequestObservation extends Model
{
	protected $table = 'human_talent_request_observation';
}
