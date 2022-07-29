<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Campus;
use App\Models\TypePharmacyStock;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PharmacyStock
 * 
 * @property int $id 
 * @property string $name
 * @property BigInteger $type_pharmacy_stock_id
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
	public function type_pharmacy_stock()
	{
		return $this->belongsTo(TypePharmacyStock::class);
	}

}
