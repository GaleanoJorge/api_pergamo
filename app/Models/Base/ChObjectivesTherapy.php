<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bed
 * 
 * @property int $id 
 * @property string $strengthen
 * @property string $promote
 * @property string $title 
 * @property string $improve
 * @property string $re_education
 * @property string $hold 	
 * @property string $check 	
 * @property string $train 	
 * @property string $headline 	
 * @property string $look_out 	
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChObjectivesTherapy extends Model
{
	protected $table = 'ch_objectives_therapy';
	
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
