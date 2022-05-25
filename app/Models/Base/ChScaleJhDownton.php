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
 * @property string $falls_title
 * @property int $falls_value
 * @property string $falls_detail
 * @property string $medication_title
 * @property int $medication_value
 * @property string $medication_detail
 * @property string $deficiency_title
 * @property int $deficiency_value
 * @property string $deficiency_detail
 * @property string $mental_title
 * @property int $mental_value
 * @property string $mental_detail
 * @property string $wandering_title
 * @property int $wandering_value
 * @property string $wandering_detail
 * @property int $total
 * @property string $risk
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChScaleJhDownton extends Model
{
	protected $table = 'ch_scale_jh_downton';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
