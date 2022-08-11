<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChSwExpenses
 * 
 * @property int $id
 * @property int $feeding
 * @property int $gas
 * @property int $light
 * @property int $aqueduct
 * @property int $rent
 * @property int $transportation
 * @property int $recreation
 * @property int $education
 * @property int $medical
 * @property int $cell_phone
 * @property int $landline
 * @property int $total

 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChSwExpenses extends Model
{
	protected $table = 'ch_sw_expenses';

	
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
