<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\Assistance;
use App\Models\Specialty;

/**
 * Class AssistanceSpecial
 * 
 * @property int $id
 * @property BigInteger $specialty_id
 * @property BigInteger $assistance_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class AssistanceSpecial extends Model
{
	protected $table = 'assistance_special';
	
	public function specialty()
	{
		return $this->belongsTo(Specialty::class,'specialty_id');
	}
	
}
