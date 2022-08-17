<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Assistance;
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

	// public function assistance()
	// {
	// 	return $this->belongsTo(Assistance::class);
	// }
}
