<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\FixedAccessories;
use App\Models\FixedAdd;
use App\Models\FixedAssets;
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FixedLoan
 
 * 
 * @property int $id
 * @property integer $amount
 * @property integer $amount_damaged
 * @property integer $amount_provition
 * @property integer $fixed_assets_id
 * @property integer $fixed_accessories_id
 * @property BigInteger $fixed_add_id
 * @property BigInteger $responsible_user_id

 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class FixedLoan extends Model
{
	protected $table = 'fixed_loan';

	public function fixed_add()
	{
		return $this->belongsTo(FixedAdd::class);
	}
	public function fixed_accessories()
	{
		return $this->belongsTo(FixedAccessories::class);
	}
	public function fixed_assets()
	{
		return $this->belongsTo(FixedAssets::class);
	}

	public function responsible_user()
	{
		return $this->belongsTo(User::class);
	}
}
