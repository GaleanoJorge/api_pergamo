<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChPatientExit;
use App\Models\LitersPerMinute;
use App\Models\Ostomy;
use App\Models\OxygenType;
use App\Models\PatientPosition;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChNotesDescription
 
 * 
 * @property int $id
 * @property int $patient_position_id
 * @property int $ostomy_id
 * @property string $hair_revision
 * @property boolean $has_oxigen
 * @property int $oxygen_type_id
 * @property int $liters_per_minute_id
 * @property int $change_position_id
 * @property string $patient_dry
 * @property string $unit_arrangement
 * @property int $type_record_id
 * @property int $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChNotesDescription extends Model
{
	protected $table = 'ch_notes_description';

	public function patient_position()
	{
		return $this->belongsTo(PatientPosition::class, 'patient_position_id');
	}

	public function ostomy()
	{
		return $this->belongsTo(Ostomy::class, 'ostomy_id');
	}

	public function oxygen_type()
	{
		return $this->belongsTo(OxygenType::class, 'oxygen_type_id');
	}

	
	public function liters_per_minute()
	{
		return $this->belongsTo(LitersPerMinute::class, 'liters_per_minute_id');
	}

	public function change_position()
	{
		return $this->belongsTo(PatientPosition::class, 'change_position_id');
	}
}
