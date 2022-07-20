<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\PatientPosition;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdministrationRoute
 
 * 
 * @property int $id
 * @property int $patient_position_id
 * @property string $observation_position
 * @property int $ostomy_id
 * @property string $observation
 * @property string $hair_revision
 * @property int $type_record_id
 * @property int $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChNursingEntry extends Model
{
	protected $table = 'ch_nursing_entry';


	public function patient_position()
	{
		return $this->belongsTo(PatientPosition::class, 'patient_position_id');
	}

	
}
