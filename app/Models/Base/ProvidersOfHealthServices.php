<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Country;
use App\Models\Municipality;
use App\Models\Region;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProvidersOfHealthServices
 * 
 * @property int $id
 * @property string $name
 * @property int $country_id
 * @property int $region_id
 * @property int $municipality_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models\Base
 */
class ProvidersOfHealthServices extends Model
{
	protected $table = 'providers_of_health_services';

	public function country()
	{
		return $this->belongsTo(Country::class);
	}

	public function region()
	{
		return $this->belongsTo(Region::class);
	}

	public function municipality()
	{
		return $this->belongsTo(Municipality::class);
	}
}
