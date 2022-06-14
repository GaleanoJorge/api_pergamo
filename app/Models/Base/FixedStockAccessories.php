<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\FixedAccessories;
use App\Models\FixedLoan;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FixedStockAccessories
 * 
 * @property int $id 
 * @property string $amount_loan
 * @property BigInteger $fixed_accessories_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class FixedStockAccessories extends Model
{
	protected $table = 'fixed_stock_accessories';

	public function fixed_accessories()
	{
		return $this->belongsTo(FixedAccessories::class);
	}
}
