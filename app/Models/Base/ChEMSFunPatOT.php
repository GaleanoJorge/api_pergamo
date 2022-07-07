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
 * Class ChEMSFunPatOT
 * 
 * @property int $id
 * @property string $head_right
 * @property string $head_left
 * @property string $mouth_right
 * @property string $mouth_left
 * @property string $shoulder_right
 * @property string $shoulder_left
 * @property string $back_right
 * @property string $back_left
 * @property string $waist_right
 * @property string $waist_left
 * @property string $knee_right
 * @property string $knee_left
 * @property string $foot_right
 * @property string $foot_left

 * @property unsignedBigInteger type_record_id 
 * @property unsignedBigInteger ch_record_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChEMSFunPatOT extends Model
{
	protected $table = 'ch_e_m_s_fun_pat_o_t';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
