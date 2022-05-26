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
 * @property string $pps_title
 * @property int $pps_value
 * @property string $pps_detail
 * @property string $oral_title 	
 * @property int $oral_value 	
 * @property string $oral_detail
 * @property string $edema_title
 * @property int $edema_value
 * @property string $edema_detail 	
 * @property string $dyspnoea_title 	
 * @property int $dyspnoea_value
 * @property string $dyspnoea_detail
 * @property string $delirium_title
 * @property int $delirium_value 	
 * @property string $delirium_detail 	
 * @property int $total 	
 * @property string $classification 	
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChScalePpi extends Model
{
	protected $table = 'ch_scale_ppi';
	
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
