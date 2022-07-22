<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\ServicesBriefcase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeConsents
 * 
 * @property int $id
 * @property int $name
 * @property string $file
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class TypeConsents extends Model
{
	protected $table = 'type_consents';

	}
	// public function role_attention()
	// {
	// 	return $this->hasOneThrough(
	// 		RoleAttention::class,
	// 		TypeOfAttention::class,
	// 		'type_of_attention_id',
	// 	);
	// }

