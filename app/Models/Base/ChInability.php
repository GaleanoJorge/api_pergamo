<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChContingencyCode;
use App\Models\ChRecord;
use App\Models\ChTypeInability;
use App\Models\ChTypeProcedure;
use App\Models\ChTypeRecord;
use App\Models\Diagnosis;
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
 * @property Carbon $total_days
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

	public function ch_contingency_code()
	{
		return $this->belongsTo(ChContingencyCode::class);
	}
	public function diagnosis()
	{
		return $this->belongsTo(Diagnosis::class);
	}
	public function ch_type_inability()
	{
		return $this->belongsTo(ChTypeInability::class);
	}
	public function ch_type_procedure()
	{
		return $this->belongsTo(ChTypeProcedure::class);
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

