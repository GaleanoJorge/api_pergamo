<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChPsAreas;
use App\Models\ChPsAssociation;
use App\Models\Relationship;
use App\Models\ChPsEpisodes;
use App\Models\ChPsObsessive;
use App\Models\ChPsOverrated;
use App\Models\ChPsSpeed;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChPsThought
 * 
 * @property int $id
 * @property string $grade 
 * @property string $contents 
 * @property string $prevalent 
 * @property string $observations 
 * @property unsignedBigInteger $ch_ps_speed_id 
 * @property unsignedBigInteger $ch_ps_delusional_id 
 * @property unsignedBigInteger $ch_ps_overrated_id 
 * @property unsignedBigInteger $ch_ps_obsessive_id 
 * @property unsignedBigInteger $ch_ps_association_id 
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChPsThought extends Model
{
	protected $table = 'ch_ps_thought';

	public function ch_ps_speed()
	{
		return $this->belongsTo(ChPsSpeed::class);
	}
	public function ch_ps_delusional()
	{
		return $this->belongsTo(ChPsDelusional::class);
	}		
	public function ch_ps_overrated()
	{
		return $this->belongsTo(ChPsOverrated::class);
	}		
	public function ch_ps_obsessive()
	{
		return $this->belongsTo(ChPsObsessive::class);
	}		
	public function ch_ps_association()
	{
		return $this->belongsTo(ChPsAssociation::class);
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
