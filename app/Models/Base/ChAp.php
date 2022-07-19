<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChRecord;
use App\Models\ChTypeRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChAp
 * 
 * @property int $id
 * @property string $analisys
 * @property string $plan
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChAp extends Model
{
	protected $table = 'ch_ap';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
