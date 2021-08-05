<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\CustomField;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomFieldType
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|CustomField[] $custom_fields
 *
 * @package App\Models\Base
 */
class CustomFieldType extends Model
{
	protected $table = 'custom_field_type';

	public function custom_fields()
	{
		return $this->hasMany(CustomField::class);
	}
}
