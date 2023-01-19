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
 * @property string $recomendations
 * @property unsignedBigInteger ch_diagnosis_id 
 * @property unsignedBigInteger type_record_id 
 * @property unsignedBigInteger ch_record_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChEValorationOT extends Model
{
	protected $table = 'ch_e_valoration_o_t';

	public function ch_diagnosis()
	{
		return $this->belongsTo(Diagnosis::class);
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
