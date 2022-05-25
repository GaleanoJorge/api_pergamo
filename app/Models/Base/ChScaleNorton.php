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
 * @property string $physical_title
 * @property int $physical_value
 * @property string $physical_detail
 * @property string $mind_title 	
 * @property int $mind_value 	
 * @property string $mind_detail
 * @property string $mobility_title
 * @property int $mobility_value
 * @property string $mobility_detail 	
 * @property string $activity_title 	
 * @property int $activity_value
 * @property string $activity_detail
 * @property string $incontinence_title
 * @property int $incontinence_value 	
 * @property string $incontinence_detail 	
 * @property int $total 	
 * @property string $risk 	
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChScaleNorton extends Model
{
	protected $table = 'ch_scale_norton';
	
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
