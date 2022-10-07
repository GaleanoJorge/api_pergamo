<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChPsAreas;
use App\Models\ChPsAttention;
use App\Models\Relationship;
use App\Models\ChPsEpisodes;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChPsIntellective
 * 
 * @property int $id
 * @property string $memory 
 * @property string $att_observations 
 * @property string $me_observations 
 * @property string $perception
 * @property string $per_observations 
 * @property string $autopsychic
 * @property string $allopsychic
 * @property string $space
 * @property unsignedBigInteger $ch_ps_attention_id
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChPsIntellective extends Model
{
	protected $table = 'ch_ps_intellective';

	public function ch_ps_attention()
	{
		return $this->belongsTo(ChPsAttention::class);
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
