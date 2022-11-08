<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChPsAnger;
use App\Models\ChPsEpisodes;
use App\Models\ChPsFear;
use App\Models\ChPsInsufficiency;
use App\Models\ChPsJoy;
use App\Models\ChPsSadness;
use App\Models\ChPsSeveral;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChPsSphere
 * 
 * @property int $id
 * @property boolean $euthymia 
 * @property string $observations 
 * @property unsignedBigInteger $ch_ps_sadness_id 
 * @property unsignedBigInteger $ch_ps_joy_id 
 * @property unsignedBigInteger $ch_ps_fear_id
 * @property unsignedBigInteger $ch_ps_anger_id 
 * @property unsignedBigInteger $ch_ps_insufficiency_id
 * @property unsignedBigInteger $ch_ps_several_id
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChPsSphere extends Model
{
	protected $table = 'ch_ps_sphere';

	public function ch_ps_sadness()
	{
		return $this->belongsTo(ChPsSadness::class);
	}
	public function ch_ps_joy()
	{
		return $this->belongsTo(ChPsJoy::class);
	}	
	public function ch_ps_fear()
	{
		return $this->belongsTo(ChPsFear::class);
	}	
	public function ch_ps_anger()
	{
		return $this->belongsTo(ChPsAnger::class);
	}	
	public function ch_ps_insufficiency()
	{
		return $this->belongsTo(ChPsInsufficiency::class);
	}	
	public function ch_ps_several()
	{
		return $this->belongsTo(ChPsSeveral::class);
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
