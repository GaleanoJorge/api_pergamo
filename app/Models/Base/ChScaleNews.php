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
 * @property string $'p_one_title', 
 * @property int $'p_one_value',
 * @property string $'p_one_detail',
 * @property string $'p_two_title',
 * @property int $'p_two_value',
 * @property string $'p_two_detail',
 * @property string $'p_three_title',
 * @property int $'p_three_value',
 * @property string $'p_three_detail', 
 * @property string $'p_four_title',
 * @property int $'p_four_value',
 * @property string $'p_four_detail',
 * @property string $'p_five_title',
 * @property int $'p_five_value',
 * @property string $'p_five_detail',
 * @property string $'p_six_title',
 * @property int $'p_six_value', 
 * @property string $'p_six_detail',
 * @property string $'p_seven_title',
 * @property int $'p_seven_value',
 * @property string $'p_seven_detail',
 * @property string $'p_eight_title',
 * @property string $'p_eight_value',
 * @property int $'p_eight_detail',
 * @property int $'qualification',
 * @property string $'risk',
 * @property string $'response',
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChScaleNews extends Model
{
	protected $table = 'ch_scale_news';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
