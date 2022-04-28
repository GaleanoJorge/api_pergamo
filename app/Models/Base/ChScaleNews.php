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
 * @property int $'parameter_one', 
 * @property int $'parameter_two',
 * @property int $'parameter_three',
 * @property int $'parameter_four',
 * @property int $'parameter_five',
 * @property int $'parameter_six',
 * @property int $'parameter_seven',
 * @property int $'parameter_eight',
 * @property int $'qualification',
 * @property string $'risk',
 * @property string $'response',
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChScaleNews extends Model
{
	protected $table = 'ch_scale_news';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
