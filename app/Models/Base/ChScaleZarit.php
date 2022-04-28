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
 *@property int $q_one
 *@property int $q_two
 *@property int $q_three
 *@property int $q_four
 *@property int $q_five
 *@property int $q_six
 *@property int $q_seven
 *@property int $q_eight
 *@property int $q_nine
 *@property int $q_ten
 *@property int $q_eleven
 *@property int $q_twelve
 *@property int $q_thirteen
 *@property int $q_fourteen
 *@property int $q_fifteen
 *@property int $q_sixteen
 *@property int $q_seventeen
 *@property int $q_eighteen
 *@property int $q_nineteen
 *@property int $q_twenty
 *@property int $q_twenty_one
 *@property int $q_twenty_two
 *@property int $total
 *@property string $classification
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChScaleZarit extends Model
{
	protected $table = 'ch_scale_zarit';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
