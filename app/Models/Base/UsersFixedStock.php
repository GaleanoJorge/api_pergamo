<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\FixedStock;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersFixedStock
 * 
 * @property int $id 
 * @property BigInteger $fixed_stock_id
 * @property BigInteger $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class UsersFixedStock extends Model
{
	protected $table = 'users_fixed_stock';

	public function fixed_stock()
	{
		return $this->belongsTo(FixedStock::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
