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
 * @property string $q_one_title
 * @property int $q_one_value
 * @property string $q_one_detail
 * @property string $q_two_title
 * @property int $q_two_value
 * @property string $q_two_detail
 * @property string $q_three_title
 * @property int $q_three_value
 * @property string $q_three_detail
 * @property string $q_four_title
 * @property int $q_four_value
 * @property string $q_four_detail
 * @property string $q_five_title
 * @property int $q_five_value
 * @property string $q_five_detail
 * @property string $q_six_title
 * @property int $q_six_value
 * @property string $q_six_detail
 * @property int $total
 * @property string $classification
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChScaleFragility extends Model
{
	protected $table = 'ch_scale_fragility';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
