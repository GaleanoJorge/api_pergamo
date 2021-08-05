<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\CustomField;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomFieldUserRole
 * 
 * @property int $id
 * @property int $custom_field_id
 * @property int $user_role_id
 * @property string $value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property CustomField $custom_field
 * @property UserRole $user_role
 *
 * @package App\Models\Base
 */
class CustomFieldUserRole extends Model
{
	protected $table = 'custom_field_user_role';

	protected $casts = [
		'custom_field_id' => 'int',
		'user_role_id' => 'int'
	];

	public function custom_field()
	{
		return $this->belongsTo(CustomField::class);
	}

	public function user_role()
	{
		return $this->belongsTo(UserRole::class);
	}
}
