<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\IdentificationType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PatientData
 * 
 * @property int $id
 * @property int $admissions_id
 * @property string $patient_data_type
 * @property string $firstname
 * @property string $middlefirstname
 * @property string $lastname
 * @property string $middlelastname
 * @property string $identification
 * @property int $phone
 * @property string $email
 * @property string $residence_address
 * @property int $identification_type_id
 * @property int $affiliate_type_id
 * @property int $special_attention_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class PatientData extends Model
{
	protected $table = 'patient_data';

	protected $fillable = [
		'admission_id',
		'identification_type_id',
		'affiliate_type_id',
		'special_attention_id',
	];

	public function identification_type()
	{
		return $this->belongsTo(IdentificationType::class);
	}
}
