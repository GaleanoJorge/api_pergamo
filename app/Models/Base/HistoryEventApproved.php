<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ApprovedStatus;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HistoryEventApproved
 * 
 * @property int $id
 * @property int $event_id
 * @property int $approved_status_id
 * @property int $user_id
 * @property string $observations
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property ApprovedStatus $approved_status
 * @property Event $event
 * @property User $user
 *
 * @package App\Models\Base
 */
class HistoryEventApproved extends Model
{
	protected $table = 'history_event_approved';

	protected $casts = [
		'event_id' => 'int',
		'approved_status_id' => 'int',
		'user_id' => 'int'
	];

	public function approved_status()
	{
		return $this->belongsTo(ApprovedStatus::class);
	}

	public function event()
	{
		return $this->belongsTo(Event::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
