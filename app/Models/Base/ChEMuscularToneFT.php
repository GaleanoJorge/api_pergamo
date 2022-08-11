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
 * Class ChEMuscularToneFT
 * 
 * @property int $id
 * @property string $head
 * @property string $sup_left
 * @property string $hand_left
 * @property string $sup_right
 * @property string $hand
 * @property string $trunk
 * @property string $inf_left
 * @property string $left_foot
 * @property string $inf_right
 * @property string $right_foot
 * @property string $observation
 * 
 * @property unsignedBigInteger type_record_id 
 * @property unsignedBigInteger ch_record_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChEMuscularToneFT extends Model
{
	protected $table = 'ch_e_muscular_tone_f_t';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}






