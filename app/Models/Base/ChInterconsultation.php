<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChRecord;
use App\Models\ChTypeRecord;
use App\Models\HourlyFrequency;
use App\Models\Specialty;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChInterconsultation
 * 
 * @property int $id
 * @property BigInteger $specialty_id
 * @property Integer $amount
 * @property BigInteger $hourly_frequency_id
 * @property string $observations
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChInterconsultation extends Model
{
	protected $table = 'ch_interconsultation';

	public function specialty()
	{
		return $this->belongsTo(Specialty::class);
	}
	public function hourly_frequency()
	{
		return $this->belongsTo(HourlyFrequency::class);
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
