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
 * @property string $face_title
 * @property int $face_value
 * @property string $face_detail
 * @property string $leg_titles 	
 * @property int $legs_value 	
 * @property string $legs_detail
 * @property string $activity_title
 * @property int $activity_value
 * @property string $activity_detail 	
 * @property string $crying_title 	
 * @property int $crying_value
 * @property string $crying_detail
 * @property string $comfor_titlet
 * @property int $comfort_value 	
 * @property string $comfort_detail 	
 * @property int $total 	
 * @property string $classification 	
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChScaleFlacc extends Model
{
	protected $table = 'ch_scale_flacc';
	
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
