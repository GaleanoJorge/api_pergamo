<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tracing
 * 
 * @property int $id
 * @property string $observation 
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class Tracing extends Model
{
	protected $table = 'tracing';

	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
