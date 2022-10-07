<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChPsAreas;
use App\Models\Relationship;
use App\Models\ChPsEpisodes;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChPsRelationship
 * 
 * @property int $id
 * @property string $position 
 * @property string $self_care 
 * @property string $visual 
 * @property string $verbal 
 * @property string $appearance 
 * @property string $att_observations 
 * @property string $aw_observations 
 * @property string $sl_observations 
 * @property string $sex_observations 
 * @property string $fee_observations 
 * @property string $ex_observations 
 * @property string $attitude
 * @property unsignedBigInteger $ch_ps_awareness_id 
 * @property unsignedBigInteger $ch_ps_sleep_id
 * @property string $exam_others
 * @property string $sexuality
 * @property string $feeding
 * @property string $excretion
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChPsRelationship extends Model
{
	protected $table = 'ch_ps_relationship';

	public function ch_ps_awareness()
	{
		return $this->belongsTo(ChPsAwareness::class);
	}
	public function ch_ps_sleep()
	{
		return $this->belongsTo(ChPsSleep::class);
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
