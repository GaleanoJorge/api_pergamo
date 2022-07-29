<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Diagnosis;
use App\Models\ChBackground;
use App\Models\ChGynecologists;
use App\Models\ChRecord;
use App\Models\ChTypeRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bed
 * 
 * @property int $id
 * @property BigInteger $ch_ass_pattern_id
 * @property BigInteger $ch_ass_swing_id
 * @property BigInteger $ch_ass_frequency_id
 * @property BigInteger $ch_ass_mode_id
 * @property BigInteger $ch_ass_cough_id
 * @property BigInteger $ch_ass_chest_type_id
 * @property BigInteger $ch_ass_chest_symmetry_id 
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 * 
 *
 * @package App\Models\Base
 */
class ChTherapeuticAss extends Model
{
	protected $table = 'ch_therapeutic_ass';

	public function ch_ass_pattern()
	{
		return $this->belongsTo(ChAssPattern::class);
	}
	public function ch_ass_swing()
	{
		return $this->belongsTo(ChAssSwing::class);
	}
	public function ch_ass_frequency()
	{
		return $this->belongsTo(ChAssFrequency::class);
	}
	public function ch_ass_mode()
	{
		return $this->belongsTo(ChAssMode::class);
	}
	public function ch_ass_cough()
	{
		return $this->belongsTo(ChAssCough::class);
	}
	public function ch_ass_chest_type()
	{
		return $this->belongsTo(ChAssChestType::class);
	}
	public function ch_ass_chest_symmetry()
	{
		return $this->belongsTo(ChAssChestSymmetry::class);
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
