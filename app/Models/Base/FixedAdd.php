<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;
;
use App\Models\FixedAccessories;
use App\Models\FixedAssets;
use App\Models\FixedLocationCampus;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FixedAdd
 * 
 * @property int $id
 * @property BigInteger $fixed_assets_id
 * @property BigInteger $fixed_accessories_id
 * @property BigInteger $fixed_location_campus_id
 * @property BigInteger $responsible_user_id
 * @property string $observation
 * @property string $amount_ship
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class FixedAdd extends Model
{
	protected $table = 'fixed_add';

	public function fixed_assets()
	{
		return $this->belongsTo(FixedAssets::class);
	}

	public function fixed_accessories()
	{
		return $this->belongsTo(FixedAccessories::class);
	}

	public function fixed_location_campus()
	{
		return $this->belongsTo(FixedLocationCampus::class);
	}

	public function responsible_user()
	{
		return $this->belongsTo(UserRole::class);
	}

}
