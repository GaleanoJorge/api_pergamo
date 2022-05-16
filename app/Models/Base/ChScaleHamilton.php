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
 * @property int $variable_one
 * @property int $variable_two
 * @property int $variable_three
 * @property int $variable_four
 * @property int $variable_five
 * @property int $variable_six
 * @property int $variable_seven
 * @property int $variable_eigth
 * @property int $variable_nine
 * @property int $variable_ten
 * @property int $variable_eleven
 * @property int $variable_twelve
 * @property int $variable_thirteen
 * @property int $variable_fourteen
 * @property int $variable_fifteen
 * @property int $variable_sixteen
 * @property int $variable_seventeen
 * @property int $total
 * @property int $qualification
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChScaleHamilton extends Model
{
	protected $table = 'ch_scale_hamilton';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
