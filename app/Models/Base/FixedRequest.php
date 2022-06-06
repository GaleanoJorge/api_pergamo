<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Admissions;
use App\Models\FixedAccessories;
use App\Models\FixedAssets;
use App\Models\FixedType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FixedRequest
 * 
 * @property int $id
 * @property BigInteger $fixed_type_id
 * @property BigInteger $fixed_assets_id
 * @property BigInteger $fixed_accessories_id
 * @property BigInteger $request_user_id
 * @property BigInteger $patient_id
 * @property integer $request_amount
 * @property string $observation
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class FixedRequest extends Model
{
	protected $table = 'fixed_request';

	public function fixed_type()
	{
		return $this->belongsTo(FixedType::class);
	}

	public function fixed_assets()
	{
		return $this->belongsTo(FixedAssets::class);
	}

	public function fixed_accessories()
	{
		return $this->belongsTo(FixedAccessories::class);
	}

	public function request_user()
	{
		return $this->belongsTo(User::class);
	}

	public function patient()
	{
		return $this->belongsTo(Admissions::class);
	}
}
