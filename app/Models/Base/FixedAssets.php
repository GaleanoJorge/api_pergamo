<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Company;
use App\Models\FixedClasification;
use App\Models\FixedCondition;
use App\Models\FixedProperty;
use App\Models\FixedTypeRole;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FixedAssets
 
 * 
 * @property int $id
 * @property BigInteger $fixed_clasification_id
 * @property BigInteger $fixed_type_role_id
 * @property BigInteger $fixed_property_id
 * @property BigInteger $company_id
 * @property string $obs_property
 * @property string $plaque
 * @property integer $amount
 * @property string $name
 * @property string $model
 * @property string $mark
 * @property string $serial
 * @property string $description
 * @property string $detail_description
 * @property string $color
 * @property BigInteger $fixed_condition_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class FixedAssets extends Model
{
	protected $table = 'fixed_assets';

	public function fixed_clasification()
	{
		return $this->belongsTo(FixedClasification::class);
	}

	public function fixed_type_role()
	{
		return $this->belongsTo(FixedTypeRole::class);
	}

	public function fixed_property()
	{
		return $this->belongsTo(FixedProperty::class);
	}

	public function fixed_condition()
	{
		return $this->belongsTo(FixedCondition::class);
	}

	public function company()
	{
		return $this->belongsTo(Company::class);
	}
}
