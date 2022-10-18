<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Admissions;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

/**
 * Class LogAdmissions
 * 
 * @property int $id
 * @property BigInteger $user_id
 * @property BigInteger $patient_id
 * @property BigInteger $admissions_id
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * 
 *
 * @package App\Models\Base
 */
class LogAdmissions extends Model
{
	protected $table = 'log_admissions';
	
	public function user()
	{
		return $this->belongsTo(User::class);
	}
		public function patient()
	{
		return $this->belongsTo(Patient::class);
	}
		public function admissions()
	{
		return $this->belongsTo(Admissions::class);
	}
	
}
