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
 * Class AcademicLevel
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models\Base
 */
class AcademicLevel extends Model
{
	protected $table = 'academic_level';

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
