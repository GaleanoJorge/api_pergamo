<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PatientData
 * 
 * @property int $id
 * @property string $patient_data_firstname
 * @property string $patient_data_middlefirstname
 * @property string $patient_data_lastname
 * @property string $patient_data_middlelastname
 * @property string $patient_data_identification
 * @property string $patient_data_phone
 * @property string $patient_data_email
 * @property string $patient_data_residence_address
 * @property string $identification_type_id
 * @property string $affiliate_type_id
 * @property string $special_attention_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class PatientData extends Model
{
	protected $table = 'patient_data';

	
}
