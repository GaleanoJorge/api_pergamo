<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChLiquidControl as ModelsChLiquidControl;
use App\Models\ChRecord;
use App\Models\ChRouteFluid;
use App\Models\ChTypeFluid;
use App\Models\ChVitalSigns;
use App\Models\NursingCarePlan;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdministrationRoute
 
 * 
 * @property int $id
 * @property int $clock
 * @property int $ch_route_fluid_id
 * @property int $ch_type_fluid_id
 * @property int $delivered_volume
 * @property string $bag_number
 * @property int $type_record_id
 * @property int $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChLiquidControl extends Model
{
	protected $table = 'ch_liquid_control';

	public function ch_route_fluid()
	{
		return $this->belongsTo(ChRouteFluid::class, 'ch_route_fluid_id');
	}

	public function ch_type_fluid()
	{
		return $this->belongsTo(ChTypeFluid::class, 'ch_type_fluid_id');
	}

	public function signs()
	{
		return $this->belongsTo(
			ChVitalSigns::class,
			ChRecord::class,
			// 'id',
			'ch_record_id',
			
		);
	}
}
