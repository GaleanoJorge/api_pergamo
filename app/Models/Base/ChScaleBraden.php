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
 * @property string $sensory_title
 * @property int $sensory_value
 * @property string $sensory_detail
 * @property string $humidity_title
 * @property int $humidity_value
 * @property string $humidity_detail
 * @property string $activity_title 	
 * @property int $activity_value 	
 * @property string $activity_detail
 * @property string $mobility_title
 * @property int $mobility_value
 * @property string $mobility_detail 	
 * @property string $nutrition_title 	
 * @property int $nutrition_value
 * @property string $nutrition_detail
 * @property string $lesion_title
 * @property int $lesion_value 	
 * @property string $lesion_detail 	
 * @property int $total 	
 * @property string $risk 	
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChScaleBraden extends Model
{
	protected $table = 'ch_scale_braden';
	
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
