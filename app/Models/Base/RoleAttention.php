<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\TypeOfAttention;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RoleAttention
 * 
 * @property int $id
 * @property BigInteger $role_id
 * @property BigInteger $type_of_attention_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class RoleAttention extends Model
{
	protected $table = 'role_attention';

	
	public function role()
	{
		return $this->belongsTo(Role::class);
	}
	public function type_of_attention()
	{
		return $this->belongsTo(TypeOfAttention::class);
	}
}
