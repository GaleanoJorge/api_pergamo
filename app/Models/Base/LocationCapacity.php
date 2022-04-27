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
 * @property BigInteger $PAD_patient_quantity
 * @property BigInteger $PAD_patient_attended
 * @property BigInteger $PAD_patient_actual_capacity
 * @property int $assistance_id
 * @property int $locality_id
 * @property date $validation_date
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 

 *
 * @package App\Models\Base
 */
class LocationCapacity extends Model
{
	protected $table = 'location_capacity';

	public function assistance()
	{
		return $this->belongsTo(Assistance::class);
	}
	public function locality()
	{
		return $this->belongsTo(Locality::class);
	}
}
