<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChTypeRecord;
use App\Models\ChRecord;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bed
 * 
 * @property int $id 
 * @property string $v_one_title
 * @property int $v_one_value
 * @property string $v_one_detail
 * @property string $v_two_title
 * @property int $v_two_value
 * @property string $v_two_detail
 * @property string $v_three_title
 * @property int $v_three_value
 * @property string $v_three_detail
 * @property string $v_four_title
 * @property int $v_four_value
 * @property string $v_four_detail
 * @property string $v_five_title
 * @property int $v_five_value
 * @property string $v_five_detail
 * @property string $v_six_title
 * @property int $v_six_value
 * @property string $v_six_detail
 * @property string $v_seven_title
 * @property int $v_seven_value
 * @property string $v_seven_detail
 * @property string $v_eight_title
 * @property int $v_eight_value
 * @property string $v_eight_detail
 * @property string $v_nine_title
 * @property int $v_nine_value
 * @property string $v_nine_detail
 * @property string $v_ten_title
 * @property int $v_ten_value
 * @property string $v_ten_detail
 * @property int $total
 * @property int $risk
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChScaleScreening extends Model
{
	protected $table = 'ch_scale_screening';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
