<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChRecord;
use App\Models\ChTypeRecord;
use App\Models\Diagnosis;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TlTherapyLanguageRegular
 * 
 * @property int $id
 * @property BigInteger $diagnosis_id
 * @property string $status_patient
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class TlTherapyLanguageRegular extends Model
{
	protected $table = 'tl_therapy_language_regular';


	public function diagnosis()
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

