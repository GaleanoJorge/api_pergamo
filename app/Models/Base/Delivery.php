<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Activity;
use App\Models\GroupActivity;
use App\Models\Score;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Delivery
 * 
 * @property int $id
 * @property int $activity_id
 * @property int $user_id
 * @property int $group_activity_id
 * @property string $file_name
 * @property string $file_path
 * @property int $sync_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Activity $activity
 * @property GroupActivity $group_activity
 * @property User $user
 * @property Collection|Score[] $scores
 *
 * @package App\Models\Base
 */
class Delivery extends Model
{
	protected $table = 'delivery';

	protected $casts = [
		'activity_id' => 'int',
		'user_id' => 'int',
		'group_activity_id' => 'int',
		'sync_id' => 'int'
	];

	public function activity()
	{
		return $this->belongsTo(Activity::class);
	}

	public function group_activity()
	{
		return $this->belongsTo(GroupActivity::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function scores()
	{
		return $this->hasMany(Score::class);
	}
}
