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
 * Class ChEMSIntPatOT
 * 
 * @property int $id
 * @property string $up_right
 * @property string $up_left
 * @property string $side_right
 * @property string $side_left
 * @property string $backend_right
 * @property string $backend_left
 * @property string $frontend_right
 * @property string $frontend_left
 * @property string $down_right
 * @property string $down_left
 * @property string $full_hand_right
 * @property string $full_hand_left
 * @property string $cylindric_right
 * @property string $cylindric_left
 * @property string $hooking_right
 * @property string $hooking_left
 * @property string $fine_clamp_right
 * @property string $fine_clamp_left
 * @property string $tripod_right
 * @property string $tripod_left
 * @property string $opposition_right
 * @property string $opposition_left
 * @property string $coil_right
 * @property string $coil_left

 * @property unsignedBigInteger type_record_id 
 * @property unsignedBigInteger ch_record_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChEMSIntPatOT extends Model
{
	protected $table = 'ch_e_m_s_int_pat_o_t';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
