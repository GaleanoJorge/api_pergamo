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
 * Class ChEMSMovPatOT
 * 
 * @property int $id
 * @property string $scroll_right
 * @property string $scroll_left
 * @property string $get_up_right
 * @property string $get_up_left
 * @property string $push_right
 * @property string $push_left
 * @property string $pull_right
 * @property string $pull_left
 * @property string $transport_right
 * @property string $transport_left
 * @property string $attain_right
 * @property string $attain_left
 * @property string $bipedal_posture_right
 * @property string $bipedal_posture_left
 * @property string $sitting_posture_right
 * @property string $sitting_posture_left
 * @property string $squat_posture_right
 * @property string $squat_posture_left
 * @property string $use_both_hands_right
 * @property string $use_both_hands_left
 * @property string $alternating_movements_right
 * @property string $alternating_movements_left
 * @property string $dissociated_movements_right
 * @property string $dissociated_movements_left
 * @property string $Simultaneous_movements_right
 * @property string $Simultaneous_movements_left
 * @property string $bimanual_coordination_right
 * @property string $bimanual_coordination_left
 * @property string $hand_eye_coordination_right
 * @property string $hand_eye_coordination_left
 * @property string $hand_foot_coordination_right
 * @property string $hand_foot_coordination_left

 * @property unsignedBigInteger type_record_id 
 * @property unsignedBigInteger ch_record_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChEMSMovPatOT extends Model
{
	protected $table = 'ch_e_m_s_mov_pat_o_t';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
