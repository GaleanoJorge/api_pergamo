<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Permission;
use App\Models\PharmacyStock;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PermissionPharmacyStock
 * 
 * @property int $id 
 * @property BigInteger $pharmacy_stock_id
 * @property BigInteger $permission_id
 * @property BigInteger $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class PermissionPharmacyStock extends Model
{
	protected $table = 'permission_pharmacy_stock';

	public function pharmacy()
	{
		return $this->belongsTo(PharmacyStock::class);
	}
	public function permission()
	{
		return $this->belongsTo(Permission::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
