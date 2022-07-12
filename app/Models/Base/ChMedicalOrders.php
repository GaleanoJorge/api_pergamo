<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChRecord;
use App\Models\ChTypeRecord;
use App\Models\Frequency;

use App\Models\Procedure;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChMedicalOrders
 * 
 * @property int $id
 * @property string $ambulatory_medical_order
 * @property BigInteger $procedure_id
 * @property Integer $amount
 * @property TinyInteger $frequency_id
 * @property string $observations
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChMedicalOrders extends Model
{

	protected $table = 'ch_medical_orders';

	public function procedure()
	{
		return $this->belongsTo(Procedure::class);
	}
	public function frequency()
	{
		return $this->belongsTo(Frequency::class);
	}
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
