<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChReason;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChFailed
 * 
 * @property int $id
 * @property string $descriptions
 * @property string $file_evidence
 * @property unsignedBigInteger $ch_reason_id
 * @property unsignedBigInteger $type_record_id
 * @property unsignedBigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @package App\Models\Base
 */
class ChFailed extends Model
{
	protected $table = 'ch_failed';

	public function ch_reason()
	{
		return $this->belongsTo(ChReason::class);
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
