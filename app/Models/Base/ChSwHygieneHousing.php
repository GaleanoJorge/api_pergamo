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
 * Class Bed
 * 
 * @property int $id
 * @property string $cleanliness
 * @property string $obs_cleanliness
 * @property string $illumination
 * @property string $obs_illumination
 * @property string $ventilation
 * @property string $obs_ventilation
 * @property string $pests
 * @property string $obs_pests
 * @property string $sanitary
 * @property string $obs_sanitary
 * @property string $trash
 * @property string $obs_trash
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 * 
 *
 * @package App\Models\Base
 */
class ChSwHygieneHousing extends Model
{
	protected $table = 'ch_sw_hygiene_housing';


	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
