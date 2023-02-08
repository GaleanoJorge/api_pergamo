<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Authorization;
use App\Models\CopayParameters;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentType
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Authorization[] $authorizations
 * @property Collection|CopayParameters[] $copay_parameters
 *
 * @package App\Models\Base
 */
class PaymentType extends Model
{
	protected $table = 'payment_type';

	public function authorizations()
	{
		return $this->hasMany(Authorization::class);
	}

	public function copay_parameters()
	{
		return $this->hasMany(CopayParameters::class);
	}

}
