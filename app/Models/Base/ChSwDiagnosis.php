<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Diagnosis;
use App\Models\ReasonExit;
use App\Models\ChDiagnosis;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
/**
 * Class ChSwDiagnosis
 
 * 
 * @property int $id
 * @property unsignedBigInteger $ch_diagnosis_id
 * @property string $sw_diagnosis
 * @property unsignedBigInteger $type_record_id
 * @property unsignedBigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChSwDiagnosis extends Model
{
	protected $table = 'ch_sw_diagnosis';

	public function ch_diagnosis()
	{
		return $this->belongsTo(ChDiagnosis::class,);
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
