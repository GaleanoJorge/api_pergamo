<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\PadRisk;
use App\Models\Role;
use App\Models\ScopeOfAttention;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tariff
 * 
 * @property int $id
 * @property double $name
 * @property double $amount
 * @property BigInteger $pad_risk_id
 * @property BigInteger $role_id
 * @property BigInteger $scope_of_attention_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Tariff extends Model
{
	protected $table = 'tariff';


	public function pad_risk()
	{
		return $this->belongsTo(PadRisk::class);
	}
	public function role()
	{
		return $this->belongsTo(Role::class);
	}
	public function scope_of_attention()
	{
		return $this->belongsTo(ScopeOfAttention::class);
	}
}