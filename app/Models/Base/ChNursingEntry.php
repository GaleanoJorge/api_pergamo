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
 * @property string $name
 * @property int $type
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
