<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ProductGeneric;
use App\Models\AdministrationRoute;
use App\Models\HourlyFrequency;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
/**
 * Class ChFormulation
 
 * 
 * @property int $id
 * @property unsignedBigInteger $product_generic_id
 * @property unsignedBigInteger $administration_route_id
 * @property unsignedBigInteger $hourly_frequency_id
 * @property string $medical_formula
 * @property Integer $treatment_days
 * @property string $outpatient_formulation
 * @property string $dose
 * @property string $observation
 * @property unsignedBigInteger $type_record_id
 * @property unsignedBigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChFormulation extends Model
{
	protected $table = 'ch_formulation';

	public function product_generic()
	{
		return $this->belongsTo(ProductGeneric::class);
	}
	public function administration_route()
	{
		return $this->belongsTo(AdministrationRoute::class);
	}
	public function hourly_frequency()
	{
		return $this->belongsTo(HourlyFrequency::class);
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
