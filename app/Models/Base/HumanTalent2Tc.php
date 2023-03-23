<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HumanTalent2Tc
 * 

 * @property string $full_name
 * @property string $identification
 * @property string $document_type
 * @property string $gender
 * @property string $age
 * @property integer $honorary
 * @property string $type_of_contract
 * @property string $type_of_job
 * @property string $ambit
 * @property string $cost_center
 * @property string $cost_center_code
 * @property string $position
 * @property string $area
 * @property string $month
 * @property string $year
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class HumanTalent2Tc extends Model
{
	protected $table = 'human_talent_2_tc';
}
