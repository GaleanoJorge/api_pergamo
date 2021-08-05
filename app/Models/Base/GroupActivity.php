<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Activity;
use App\Models\Delivery;
use App\Models\UserGroupActivity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GroupActivity
 * 
 * @property int $id
 * @property int $activity_id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Activity $activity
 * @property Collection|Delivery[] $deliveries
 * @property Collection|UserGroupActivity[] $user_group_activities
 *
 * @package App\Models\Base
 */
class GroupActivity extends Model
{
	protected $table = 'group_activity';

	protected $casts = [
		'activity_id' => 'int'
	];

	public function activity()
	{
		return $this->belongsTo(Activity::class);
	}

	public function deliveries()
	{
		return $this->hasMany(Delivery::class);
	}

	public function user_group_activities()
	{
		return $this->hasMany(UserGroupActivity::class);
	}
}
