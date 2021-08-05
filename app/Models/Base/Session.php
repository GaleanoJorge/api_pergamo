<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Activity;
use App\Models\AssistanceSession;
use App\Models\Group;
use App\Models\Module;
use App\Models\SessionInscription;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Session
 * 
 * @property int $id
 * @property int $module_id
 * @property int $group_id
 * @property string $name
 * @property string $description
 * @property string $teams_key
 * @property string $teams_url
 * @property string $organizer_id
 * @property string $tenant_id
 * @property Carbon $session_date
 * @property Carbon $start_time
 * @property Carbon $closing_time
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Group $group
 * @property Module $module
 * @property Collection|Activity[] $activities
 * @property Collection|AssistanceSession[] $assistance_sessions
 * @property Collection|SessionInscription[] $session_inscriptions
 *
 * @package App\Models\Base
 */
class Session extends Model
{
	protected $table = 'session';

	protected $casts = [
		'module_id' => 'int',
		'group_id' => 'int'
	];

	protected $dates = [
		'session_date',
		'start_time',
		'closing_time'
	];

	public function group()
	{
		return $this->belongsTo(Group::class);
	}

	public function module()
	{
		return $this->belongsTo(Module::class);
	}

	public function activities()
	{
		return $this->hasMany(Activity::class);
	}

	public function assistance_sessions()
	{
		return $this->hasMany(AssistanceSession::class);
	}

	public function session_inscriptions()
	{
		return $this->hasMany(SessionInscription::class);
	}
}
