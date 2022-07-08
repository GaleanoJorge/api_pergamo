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
 * @property string $murmur
 * @property string $obs_murmur
 * @property string $crepits 
 * @property string $obs_crepits
 * @property string $rales
 * @property string $obs_rales 	
 * @property string $stridor 	
 * @property string $obs_stridor
 * @property string $pleural
 * @property string $obs_pleural 
 * @property string $roncus
 * @property string $obs_roncus
 * @property string $wheezing 	
 * @property string $obs_wheezing 	
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChAuscultation extends Model
{
	protected $table = 'ch_auscultation';
	
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
