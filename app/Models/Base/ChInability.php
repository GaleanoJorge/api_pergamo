<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChRecord;
use App\Models\ChTypeRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChInability
 * 
 * @property int $id
 * @property BigInteger $ch_contingency_code_id
 * @property string $extension
 * @property Carbon $initial_date
 * @property Carbon $final_date
 * @property BigInteger $diagnosis_id
 * @property BigInteger $ch_type_inability_id
 * @property BigInteger $ch_type_procedure_id
 * @property string $observation
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChInability extends Model
{
	protected $table = 'ch_inability';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}

}

