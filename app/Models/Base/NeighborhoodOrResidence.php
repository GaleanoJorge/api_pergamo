<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\PadRisk;
use App\Models\Locality;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NeighborhoodOrResidence
 * 
 * @property int $id
 * @property string $name
 * @property BigInteger $locality_id
 * @property BigInteger $pad_risk_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class NeighborhoodOrResidence extends Model
{
	protected $table = 'neighborhood_or_residence';

	public function locality()
	{
		return $this->belongsTo(Locality::class);
	}
	public function pad_risk()
	{
		return $this->belongsTo(PadRisk::class);
	}
}
