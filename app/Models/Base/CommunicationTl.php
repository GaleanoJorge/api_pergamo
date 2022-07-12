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
 * Class CommunicationTl
 * 
 * @property int $id
 * @property string $eye_contact
 * @property string $courtesy_rules
 * @property string $communicative_intention
 * @property string $communicative_purpose
 * @property string $oral_verb_modality
 * @property string $written_verb_modality
 * @property string $nonsymbolic_nonverbal_modality
 * @property string $symbolic_nonverbal_modality
 * @property string $observations
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class CommunicationTl extends Model
{
	protected $table = 'communication_tl';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}

