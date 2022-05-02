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
 * @property int $question_one
 * @property int $question_two
 * @property int $question_three
 * @property int $question_four
 * @property int $question_five
 * @property int $question_six
 * @property int $question_seven
 * @property int $question_eight
 * @property int $question_nine
 * @property int $question_ten
 * @property int $classification
 * @property string $risk
 * @property string $recommendations
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChScalePayette extends Model
{
	protected $table = 'ch_scale_payette';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
