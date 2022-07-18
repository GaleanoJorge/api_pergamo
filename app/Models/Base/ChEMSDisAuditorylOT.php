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
 * Class ChEMSDisAuditorylOT
 * 
 * @property int $id
 * @property string $sound_sources
 * @property string $auditory_hyposensitivity
 * @property string $auditory_hypersensitivity
 * @property string $auditory_stimuli
 * @property string $auditive_discrimination

 * @property unsignedBigInteger type_record_id 
 * @property unsignedBigInteger ch_record_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChEMSDisAuditorylOT extends Model
{
	protected $table = 'ch_e_m_s_dis_auditory_o_t';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
