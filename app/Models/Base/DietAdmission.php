<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\DietConsistency;
use App\Models\Admissions;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DietAdmission
 * 
 * @property int $id
 * @property BigInteger $admissions_id
 * @property BigInteger $diet_consistency_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class DietAdmission extends Model
{
	protected $table = 'diet_admission';

	
	public function admissions()
	{
		return $this->belongsTo(Admissions::class);
	}
	public function diet_consistency()
	{
		return $this->belongsTo(DietConsistency::class);
	}
}
