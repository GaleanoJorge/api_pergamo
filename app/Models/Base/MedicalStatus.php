<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
/**
 * Class ChPatientExit
 
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * 
 * @package App\Models\Base
 */
class MedicalStatus extends Model
{
	protected $table = 'medical_status';

}
