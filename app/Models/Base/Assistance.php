<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\AssistanceSpecial;

/**
 * Class Assistance
 * 
 * @property int $id
 * @property BigInteger $user_id
 * @property string $medical_record
 * @property BigInteger $contract_type_id
 * @property BigInteger $cost_center_id
 * @property BigInteger $type_professional_id
 * @property string $attends_external_consultation
 * @property string $serve_multiple_patients
 * @property string $file_firm
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * 
 *
 * @package App\Models\Base
 */
class Assistance extends Model
{
	protected $table = 'assistance';

	public function special_field()
	{
		return $this->hasMany(AssistanceSpecial::class);
	}
	
}
