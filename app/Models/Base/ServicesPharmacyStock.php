<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\PharmacyStock;
use App\Models\ScopeOfAttention;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ServicesPharmacyStock
 * 
 * @property int $id 
 * @property BigInteger $pharmacy_stock_id
 * @property BigInteger $scope_of_attention_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ServicesPharmacyStock extends Model
{
	protected $table = 'services_pharmacy_stock';

	public function pharmacy()
	{
		return $this->belongsTo(PharmacyStock::class);
	}
	public function scope_of_attention()
	{
		return $this->belongsTo(ScopeOfAttention::class);
	}
}
