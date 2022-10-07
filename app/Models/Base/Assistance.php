<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AssistanceProcedure;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\AssistanceSpecial;
use App\Models\User;

/**
 * Class Assistance
 * 
 * @property int $id
 * @property BigInteger $user_id
 * @property string $medical_record
 * @property BigInteger $contract_type_id
 * @property BigInteger $PAD_service
 * @property BigInteger $has_car
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

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function assistance_procedure()
	{
		return $this->hasMany(AssistanceProcedure::class);
	}
	
}
