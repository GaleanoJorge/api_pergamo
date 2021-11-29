<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Assistance
 * 
 * @property int $id
 * @property BigInteger $user_id
 * @property string $medical_record
 * @property BigInteger $contract_type_id
 * @property BigInteger $cost_center_id
 * @property BigInteger $type_professional_id
 * @property BigInteger $special_field_id
 * @property BigInteger $medium_signature_file_id
 * @property string $attends_external_consultation
 * @property string $server_multiple_patients
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Assistance extends Model
{
	protected $table = 'assistance';

	
}
