<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Event;
use App\Models\HistoryEventApproved;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ApprovedStatus
 * 
 * @property int $id
 * @property string $name
 * 
 * @property Collection|Event[] $events
 * @property Collection|HistoryEventApproved[] $history_event_approveds
 *
 * @package App\Models\Base
 */
class ApprovedStatus extends Model
{
	protected $table = 'approved_status';
	public $timestamps = false;

	public function events()
	{
		return $this->hasMany(Event::class);
	}

	public function history_event_approveds()
	{
		return $this->hasMany(HistoryEventApproved::class);
	}
}
