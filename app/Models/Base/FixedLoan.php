<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\FixedAssets;
use App\Models\FixedLocationCampus;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FixedLoan
 
 * 
 * @property int $id
 * @property BigInteger $fixed_assets_id
 * @property BigInteger $fixed_location_campus_id
 * @property BigInteger $own_user_id
 * @property BigInteger $request_user_id
 * @property BigInteger $responsible_user_id
 * @property string $status
 * @property string $observation
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class FixedLoan extends Model
{
	protected $table = 'fixed_loan';

	public function fixed_assets()
	{
		return $this->belongsTo(FixedAssets::class);
	}
	public function fixed_location_campus()
	{
		return $this->belongsTo(FixedLocationCampus::class);
	}
	public function own_user()
	{
		return $this->belongsTo(User::class);
	}
	public function request_user()
	{
		return $this->belongsTo(User::class);
	}
	public function responsible_user()
	{
		return $this->belongsTo(User::class);
	}
}
