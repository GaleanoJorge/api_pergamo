<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Campus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PharmacyStock
 * 
 * @property int $id 
 * @property string $pharmacy
 * @property string $name
 * @property BigInteger $campus_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class PharmacyStock extends Model
{
	protected $table = 'pharmacy_stock';

	public function campus()
	{
		return $this->belongsTo(Campus::class);
	}
}
