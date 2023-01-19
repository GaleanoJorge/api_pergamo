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
 * @property string $pain_title
 * @property int $pain_value
 * @property string $tiredness_title
 * @property int $tiredness_value
 * @property string $retching_title
 * @property int $retching_value
 * @property string $depression_title
 * @property int $depression_value
 * @property string $anxiety_title
 * @property int $anxiety_value
 * @property string $drowsiness_title
 * @property int $drowsiness_value
 * @property string $appetite_title
 * @property int $appetite_value
 * @property string $breathing_title
 * @property int $breathing_value
 * @property string $welfare_title
 * @property int $welfare_value
 * @property string $sleep_title
 * @property int $sleep_value
 * @property string $observation
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChScaleEsas extends Model
{
	protected $table = 'ch_scale_esas';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
