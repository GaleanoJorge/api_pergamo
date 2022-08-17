<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Patient;
use App\Models\Assistance;
use App\Models\User;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PatientData
 * 
 * @property int $id
 * @property string $title
 * @property string $note
 * @property string $start_time
 * @property string $finish_time
 * @property date $start_date
 * @property date $finish_date
 * @property int $patient_id
 * @property int $assistance_id
 * @property int $user_id
 * @property int $status_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class MedicalCitation extends Model
{
	protected $table = 'patient_data';

	// protected $fillable = [
	// 	'admission_id',
	// 	'identification_type_id',
	// 	'affiliate_type_id',
	// 	'special_attention_id',
	// ];

	public function patient()
	{
		return $this->belongsTo(Patient::class);
	}
	public function assistance()
	{
		return $this->belongsTo(Assistance::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function status()
	{
		return $this->belongsTo(Status::class);
	}
}
