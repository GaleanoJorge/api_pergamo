<?php

/**
 * @property Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\VitalHydration;
use App\Models\VitalVentilated;
use App\Models\VitalTemperature;
use App\Models\VitalNeurological;
use App\Models\ChRecord;
use App\Models\ChTypeRecord;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChVitalSigns 
 * @property int $id
 * @property string $clock
 * @property integer $cardiac_frequency
 * @property integer $respiratory_frequency
 * @property integer $temperature
 * @property integer $oxigen_saturation
 * @property integer $intracranial_pressure
 * @property integer $cerebral_perfusion_pressure
 * @property integer $intra_abdominal
 * @property integer $pressure_systolic
 * @property integer $pressure_diastolic
 * @property integer $pressure_half
 * @property integer $pulse
 * @property integer $venous_pressure
 * @property string $size
 * @property string $weight
 * @property integer $glucometry
 * @property string $body_mass_index  
 * @property integer $pulmonary_systolic
 * @property integer $pulmonary_diastolic
 * @property integer $pulmonary_half
 * @property integer $head_circunference
 * @property integer $abdominal_perimeter
 * @property integer $chest_perimeter
 * @property string $right_reaction
 * @property string $pupil_size_right
 * @property string $left_reaction
 * @property string $pupil_size_left
 * @property BigInteger $ch_vital_hydration_id
 * @property BigInteger $ch_vital_ventilated_id
 * @property BigInteger $ch_vital_temperature_id
 * @property BigInteger $ch_vital_neurological_id
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 *  @package App\Models\Base
 */
class ChVitalSigns extends Model
{
	protected $table = 'ch_vital_signs';

	public function vital_hydration()
	{
		return $this->belongsTo(VitalHydration::class);
	}
	public function vital_ventilated()
	{
		return $this->belongsTo(VitalVentilated::class);
	}
	public function vital_temperature()
	{
		return $this->belongsTo(VitalTemperature::class);
	}
	public function vital_neurological()
	{
		return $this->belongsTo(VitalNeurological::class);
	}
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
