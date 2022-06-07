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
 * @property string $mind_title
 * @property int $mind_value
 * @property string $mind_detail
 * @property string $attention_title
 * @property int $attention_value
 * @property string $attention_detail
 * @property string $thought_title
 * @property int $thought_value
 * @property string $thought_detail
 * @property string $awareness_title
 * @property int $awareness_value
 * @property string $awareness_detail
 * @property int $result
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChScaleCam extends Model
{
	protected $table = 'ch_scale_cam';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
