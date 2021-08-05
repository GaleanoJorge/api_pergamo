<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ActivityType
 * 
 * @property int $id
 * @property string $name
 * @property int $group
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Activity[] $activities
 *
 * @package App\Models\Base
 */
class ActivityType extends Model
{
	protected $table = 'activity_type';

	protected $casts = [
		'group' => 'int'
	];

	public function activities()
	{
		return $this->hasMany(Activity::class);
	}
}
