<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Diagnosis;
use App\Models\ChBackground;
use App\Models\ChGynecologists;
use App\Models\ChRecord;
use App\Models\ChSwCommunications;
use App\Models\ChTypeRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bed
 * 
 * @property int $id
 * @property string $flat
 * @property string $lift
 * @property string $location
 * @property string $vehicle_access
 * @property BigInteger $ch_sw_housing_type_id
 * @property BigInteger $ch_sw_housing_id
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 * 
 *
 * @package App\Models\Base
 */
class ChSwHousingAspect extends Model
{
	protected $table = 'ch_sw_housing_aspect';

	public function ch_sw_housing_type()
	{
		return $this->belongsTo(ChSwHousingType::class);
	}
	public function ch_sw_housing()
	{
		return $this->belongsTo(ChSwHousing::class);
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
