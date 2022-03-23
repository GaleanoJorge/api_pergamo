<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;


use App\Models\ChRecord;
use App\Models\ChTypeRecord;
use App\Models\ChExternalCause;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChReasonConsultation
 * 
 * @property int $id
 * @property string reason_consultation
 * @property string current_illness
 * @property BigInteger $ch_external_cause_id
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChReasonConsultation extends Model
{
	protected $table = 'ch_reason_consultation';

	public function ch_external_cause()
	{
		return $this->belongsTo(ChExternalCause::class);
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
