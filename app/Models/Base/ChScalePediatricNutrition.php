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
 * @property string $score_one_title
 * @property int $score_one_value
 * @property string $score_one_detail
 * @property string $score_two_title
 * @property int $score_two_value
 * @property string $score_two_detail
 * @property string $score_three_title
 * @property int $score_three_value
 * @property string $score_three_detail
 * @property string $score_four_title
 * @property int $score_four_value
 * @property string $score_four_detail
 * @property int $total
 * @property int $risk
 * @property int $classification
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChScalePediatricNutrition extends Model
{
	protected $table = 'ch_scale_pediatric_nutrition';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
