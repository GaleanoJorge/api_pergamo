<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;
use App\Models\ChDiagnosis;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChBackground
 * 
 * @property int $id
 * @property string $ocupation
 * @property string $enterprice_employee
 * @property string $work_employee
 * @property string $shift_employee
 * @property string $observation_employee
 * @property string $work_independent
 * @property string $shift_independent
 * @property string $observation_independent
 * @property string $observation_home

 * @property unsignedBigInteger type_record_id 
 * @property unsignedBigInteger ch_record_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChEOccHistoryOT extends Model
{
	protected $table = 'ch_e_occ_history_o_t';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
