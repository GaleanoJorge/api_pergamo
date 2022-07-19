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
 * @property string $expansion
 * @property string $masses 
 * @property string $detail_masses 
 * @property string $crepitations
 * @property string $fracturues
 * @property string $detail_fracturues
 * @property string $airway 	
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChRtInspection extends Model
{
	protected $table = 'ch_rt_inspection';
	
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
