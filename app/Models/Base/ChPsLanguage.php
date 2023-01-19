<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChPsAreas;
use App\Models\ChPsComprehensive;
use App\Models\Relationship;
use App\Models\ChPsEpisodes;
use App\Models\ChPsExpressive;
use App\Models\ChPsOthers;
use App\Models\ChPsParaphasias;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChPsLanguage
 * 
 * @property int $id
 * @property string $observations 
 * @property unsignedBigInteger $ch_ps_expressive_id 
 * @property unsignedTinyInteger $ch_ps_comprehensive_id
 * @property unsignedTinyInteger $ch_ps_others_id
 * @property unsignedTinyInteger $ch_ps_paraphasias_id
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChPsLanguage extends Model
{
	protected $table = 'ch_ps_language';

	public function ch_ps_expressive()
	{
		return $this->belongsTo(ChPsExpressive::class);
	}
	public function ch_ps_comprehensive()
	{
		return $this->belongsTo(ChPsComprehensive::class);
	}	
	public function ch_ps_others()
	{
		return $this->belongsTo(ChPsOthers::class);
	}	
	public function ch_ps_paraphasias()
	{
		return $this->belongsTo(ChPsParaphasias::class);
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
