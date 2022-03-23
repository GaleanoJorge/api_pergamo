<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChTypeReviewSystem;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChReviewSystem
 * 
 * @property int $id
 * @property string revision
 * @property string observation
 * @property BigInteger $type_review_system_id
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChReviewSystem extends Model
{
	protected $table = 'ch_review_system';

	public function type_review_system()
	{
		return $this->belongsTo(ChTypeReviewSystem::class);
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
