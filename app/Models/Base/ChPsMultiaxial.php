<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChPsIntelligence;
use App\Models\ChPsJudgment;
use App\Models\ChPsProspecting;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChPsMultiaxial
 * 
 * @property int $id
 * @property string $axis_one 
 * @property string $axis_two 
 * @property string $axis_three 
 * @property string $axis_four 
 * @property int $eeag 
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChPsMultiaxial extends Model
{
	protected $table = 'ch_ps_multiaxial';
	
	
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
