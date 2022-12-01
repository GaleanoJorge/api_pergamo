<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;
use App\Models\Diagnosis;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChBackground
 * 
 * @property int $id
 * @property string $patient_state 

 * @property unsignedBigInteger type_record_id 
 * @property unsignedBigInteger ch_record_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChRNValorationOT extends Model
{
	protected $table = 'ch_r_n_valoration_o_t';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
