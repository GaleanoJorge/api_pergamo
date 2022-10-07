<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Assistance;
use App\Models\Bed;
use App\Models\MedicalDiaryDays;
use App\Models\Procedure;
use App\Models\Process;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PatientData
 * 
 * @property int $id
 * @property int $assistance_id
 * @property string $weekdays
 * @property string $start_time
 * @property string $finish_time
 * @property date $start_date
 * @property date $finish_date
 * @property string $interval
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class MedicalDiary extends Model
{
	protected $table = 'medical_diary';

	// protected $fillable = [
	// 	'admission_id',
	// 	'identification_type_id',
	// 	'affiliate_type_id',
	// 	'special_attention_id',
	// ];

	public function assistance()
	{
		return $this->belongsTo(Assistance::class);
	}

	public function office()
	{
		return $this->belongsTo(Bed::class);
	}

	public function  diary_status()
	{
		return $this->belongsTo(Status::class);
	}

	public function  medical_diary_days()
	{
		return $this->hasMany(MedicalDiaryDays::class,'medical_diary_id','id');
	}

	public function  procedure()
	{
		return $this->belongsTo(Procedure::class,'procedure_id','id');
	}
}
