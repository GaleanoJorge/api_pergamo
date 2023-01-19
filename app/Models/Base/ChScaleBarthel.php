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
 * @property string $eat_title
 * @property int $eat_value
 * @property string $eat_detail
 * @property string $move_title
 * @property int $move_value
 * @property string $move_detail
 * @property string $cleanliness_title
 * @property int $cleanliness_value
 * @property string $cleanliness_detail
 * @property string $toilet_title
 * @property int $toilet_value
 * @property string $toilet_detail
 * @property string $shower_title
 * @property int $shower_value
 * @property string $shower_detail
 * @property string $commute_title
 * @property int $commute_value
 * @property string $commute_detail
 * @property string $stairs_title
 * @property int $stairs_value
 * @property string $stairs_detail
 * @property string $dress_title
 * @property int $dress_value
 * @property string $dress_detail
 * @property string $fecal_title
 * @property int $fecal_value
 * @property string $fecal_detail
 * @property string $urine_title
 * @property int $urine_value
 * @property string $urine_detail
 * @property string $classification 	
 * @property int $score 	
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChScaleBarthel extends Model
{
	protected $table = 'ch_scale_barthel';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
