<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IdentificationType
 * 
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int $sga_origin_fk
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models\Base
 */
class IdentificationType extends Model
{
	protected $table = 'identification_type';

	protected $casts = [
		'sga_origin_fk' => 'int'
	];

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
