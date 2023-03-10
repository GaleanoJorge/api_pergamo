<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\Assistance;
use App\Models\Locality;

/**
 * Class Location capacity
 * 
 * @property int $id
 * @property string $phone_consult
 * @property BigInteger $PAD_base_patient_quantity
 * @property int $assistance_id
 * @property int $locality_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 

 *
 * @package App\Models\Base
 */
class BaseLocationCapacity extends Model
{
	protected $table = 'base_location_capacity';

	public function assistance()
	{
		return $this->belongsTo(Assistance::class);
	}
	public function locality()
	{
		return $this->belongsTo(Locality::class);
	}
}
