<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChEPastOT
 * 
 * @property int $id
 * @property string $family_base
 * @property string $number_childrens
 * @property string $observation_family_struct
 * @property string $academy
 * @property string $level_academy
 * @property string $observation_schooling_training
 * @property string $terapy
 * @property string $observation_terapy
 * @property string $smoke
 * @property string $f_smoke
 * @property string $alcohol
 * @property string $f_alcohol
 * @property string $sport
 * @property string $f_sport
 * @property string $sport_practice_observation
 * @property string $observation

 * @property unsignedBigInteger type_record_id 
 * @property unsignedBigInteger ch_record_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChEPastOT extends Model
{
	protected $table = 'ch_e_past_o_t';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
