<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChBackground;
use App\Models\Diagnosis;
use App\Models\ChGynecologists;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
/**
 * Class TlTherapyLanguage
 
 * 
 * @property int $id
 * @property unsignedBigInteger $medical_diagnostic_id
 * @property unsignedBigInteger $therapeutic_diagnosis_id
 * @property string $reason_consultation
 * @property unsignedBigInteger $type_record_id
 * @property unsignedBigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class TlTherapyLanguage extends Model
{
	protected $table = 'tl_therapy_language';

	public function medical_diagnostic()
	{
		return $this->belongsTo(Diagnosis::class);
	}
	public function therapeutic_diagnosis ()
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
