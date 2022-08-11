<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;;

use App\Models\Admissions;
use App\Models\FixedAccessories;
use App\Models\FixedAssets;
use App\Models\FixedLocationCampus;
use App\Models\FixedNomProduct;
use App\Models\ManagementPlan;
use App\Models\ServicesBriefcase;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FixedAdd
 * 
 * @property int $id
 * @property string $status
 * @property string $observation
 * @property string $request_amount
 * @property BigInteger $admissions_id
 * @property BigInteger $responsible_user_id
 * @property BigInteger $fixed_assets_id
 * @property BigInteger $management_plan_id
 * @property BigInteger $fixed_accessories_id
 * @property BigInteger $fixed_nom_product_id
 * @property BigInteger $fixed_location_campus_id
 * @property BigInteger $own_fixed_user_id
 * @property BigInteger $request_fixed_user_id
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
		return $this->belongsTo(User::class);
	}

	public function fixed_nom_product()
	{
		return $this->belongsTo(FixedNomProduct::class);
	}

	public function admissions()
	{
		return $this->belongsTo(Admissions::class);
	}

	public function own_fixed_user()
	{
		return $this->belongsTo(User::class);
	}

	public function request_fixed_user()
	{
		return $this->belongsTo(User::class);
	}

	public function services_briefcase()
	{
		return $this->belongsTo(ServicesBriefcase::class);
	}

	public function management_plan()
	{
		return $this->belongsTo(ManagementPlan::class, 'management_plan_id');
	}
}
