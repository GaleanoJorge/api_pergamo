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
 * Class Disclaimer
 * 
 * @property int $id
 * @property string $observation 
 * @property BigInteger $ch_record_id
 * @property BigInteger $type_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class Disclaimer extends Model
{
	protected $table = 'disclaimer';

	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
