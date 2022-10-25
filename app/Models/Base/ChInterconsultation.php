<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Admissions;
use App\Models\ChRecord;
use App\Models\ChTypeRecord;
use App\Models\Frequency;
use App\Models\HourlyFrequency;
use App\Models\ServicesBriefcase;
use App\Models\Specialty;
use App\Models\TypeOfAttention;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChInterconsultation
 * 
 * @property int $id
 * @property BigInteger $specialty_id
 * @property Integer $amount
 * @property TinyInteger $frequency_id
 * @property string $observations
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property BigInteger $services_briefcase_id
 * @property BigInteger $admissions_id
 * @property BigInteger $ambulatory_medical_order
 * @property BigInteger $type_of_attention_id
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
	public function frequency()
	{
		return $this->belongsTo(Frequency::class);
	}
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
	public function services_briefcase()
	{
		return $this->belongsTo(ServicesBriefcase::class);
	}
	public function admissions()
	{
		return $this->belongsTo(Admissions::class);
	}
	public function type_of_attention()
	{
		return $this->belongsTo(TypeOfAttention::class);
	}

	public function many_ch_record()
	{
		return $this->hasMany(ChRecord::class, 'ch_interconsultation_id', 'id')
			->with('user');
	}
	public function roles()
	{
		return $this->hasMany(RoleAttention::class, 'type_of_attention_id', 'type_of_attention_id')
			->with('role');
	}
}
