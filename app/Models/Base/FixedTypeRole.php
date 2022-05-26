<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\FixedType;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FixedTypeRole
 * 
 * @property int $id 
 * @property BigInteger $fixed_type_id
 * @property BigInteger $role_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class FixedTypeRole extends Model
{
	protected $table = 'fixed_type_role';

	public function fixed_type()
	{
		return $this->belongsTo(FixedType::class);
	}
	public function role()
	{
		return $this->belongsTo(Role::class);
	}
}
