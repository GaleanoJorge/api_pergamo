<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Frequency;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bed
 * 
 * @property int $id 
 * @property int $month
 * @property int $week
 * @property string $recommendations
 * @property int $frequency_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChRtSessions extends Model
{
	protected $table = 'ch_rt_sessions';

	public function frequency()
	{
		return $this->belongsTo(Frequency::class);
	}
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
