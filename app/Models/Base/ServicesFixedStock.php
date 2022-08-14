<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\FixedStock;
use App\Models\ScopeOfAttention;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ServicesFixedStock
 * 
 * @property int $id 
 * @property BigInteger $fixed_stock_id
 * @property BigInteger $scope_of_attention_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ServicesFixedStock extends Model
{
	protected $table = 'services_fixed_stock';

	public function fixed_stock()
	{
		return $this->belongsTo(FixedStock::class);
	}
	public function scope_of_attention()
	{
		return $this->belongsTo(ScopeOfAttention::class);
	}
}
