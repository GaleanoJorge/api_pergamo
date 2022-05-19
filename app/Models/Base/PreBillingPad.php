<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Admissions;
use App\Models\Procedure;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PreBillingPad
 * 
 * @property int $id
 * @property BigInteger $procedure_id
 * @property BigInteger $admissions_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class PreBillingPad extends Model
{
	protected $table = 'pre_billing_pad';

	
	public function procedure()
	{
		return $this->belongsTo(Procedure::class);
	}
	public function admissions()
	{
		return $this->belongsTo(Admissions::class);
	}
}
