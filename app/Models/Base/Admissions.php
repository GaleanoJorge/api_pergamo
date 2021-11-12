<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Admissions
 * 
 * @property int $id
 * @property BigInteger $admission_route_id
 * @property tinyInteger $campus_id
 * @property BigInteger $scope_of_attention_id
 * @property BigInteger $program_id
 * @property BigInteger $pavilion_id
 * @property BigInteger $flat_id
 * @property BigInteger $bed_id
 * @property BigInteger $contract_id
 * @property BigInteger $patient_data_id
 * @property BigInteger $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Admissions extends Model
{
	protected $table = 'admissions';

	
}
