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
 * @property string $ocular_title
 * @property int $ocular_value
 * @property string $ocular_detail
 * @property string $verbal_title
 * @property int $verbal_value
 * @property string $verbal_detail
 * @property string $motor_title
 * @property int $motor_value
 * @property string $motor_detail
 * @property int $total 	
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChScaleGlasgow extends Model
{
	protected $table = 'ch_scale_glasgow';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
