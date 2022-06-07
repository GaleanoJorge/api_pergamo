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
 *@property int $id 
 *@property string $q_one_title
 *@property int $q_one_value
 *@property string $q_one_detail
 *@property string $q_two_title
 *@property int $q_two_value
 *@property string $q_two_detail
 *@property string $q_three_title
 *@property int $q_three_value
 *@property string $q_three_detail
 *@property string $q_four_title
 *@property int $q_four_value
 *@property string $q_four_detail
 *@property string $q_five_title
 *@property int $q_five_value
 *@property string $q_five_detail
 *@property string $q_six_title
 *@property int $q_six_value
 *@property string $q_six_detail
 *@property string $q_seven_title
 *@property int $q_seven_value
 *@property string $q_seven_detail
 *@property string $q_eight_title
 *@property int $q_eight_value
 *@property string $q_eight_detail
 *@property string $q_nine_title
 *@property int $q_nine_value
 *@property string $q_nine_detail
 *@property string $q_ten_title
 *@property int $q_ten_value
 *@property string $q_ten_detail
 *@property string $q_eleven_title
 *@property int $q_eleven_value
 *@property string $q_eleven_detail
 *@property string $q_twelve_title
 *@property int $q_twelve_value
 *@property string $q_twelve_detail
 *@property string $q_thirteen_title
 *@property int $q_thirteen_value
 *@property string $q_thirteen_detail
 *@property string $q_fourteen_title
 *@property int $q_fourteen_value
 *@property string $q_fourteen_detail
 *@property string $q_fifteen_title
 *@property int $q_fifteen_value
 *@property string $q_fifteen_detail
 *@property string $q_sixteen_title
 *@property int $q_sixteen_value
 *@property string $q_sixteen_detail
 *@property string $q_seventeen_title
 *@property int $q_seventeen_value
 *@property string $q_seventeen_detail
 *@property string $q_eighteen_title
 *@property int $q_eighteen_value
 *@property string $q_eighteen_detail
 *@property string $q_nineteen_title
 *@property int $q_nineteen_value
 *@property string $q_nineteen_detail
 *@property string $q_twenty_title
 *@property int $q_twenty_value
 *@property string $q_twenty_detail
 *@property string $q_twenty_one_title
 *@property int $q_twenty_one_value
 *@property string $q_twenty_one_detail
 *@property string $q_twenty_two_title
 *@property int $q_twenty_two_value
 *@property string $q_twenty_two_detail
 *@property int $total
 *@property string $classification
 *@property Carbon $created_at
 *@property Carbon $updated_at
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
