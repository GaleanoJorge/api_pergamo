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
 * Class VoiceAlterationsTl
 * 
 * @property int $id
 * @property string $bell_alteration
 * @property string $tone_alteration
 * @property string $intensity_alteration
 * @property string $observations
 * @property unsignedBigInteger $type_record_id
 * @property unsignedBigInteger $ch_record_id

 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class VoiceAlterationsTl extends Model
{
	protected $table = 'voice_alterations_tl';


	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
