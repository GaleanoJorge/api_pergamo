<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Group;
use App\Models\Process;
use App\Models\ProcessDetailActivity;
use App\Models\ProcessDetailState;
use App\Models\ProcessDetailType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProcessDetail
 * 
 * @property int $id
 * @property int $process_detail_type_id
 * @property int $process_detail_state_id
 * @property int $process_id
 * @property int $group_id
 * @property int $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Group $group
 * @property ProcessDetailState $process_detail_state
 * @property ProcessDetailType $process_detail_type
 * @property Process $process
 * @property User $user
 * @property Collection|ProcessDetailActivity[] $process_detail_activities
 *
 * @package App\Models\Base
 */
class ProcessDetail extends Model
{
	protected $table = 'process_detail';

	protected $casts = [
		'process_detail_type_id' => 'int',
		'process_detail_state_id' => 'int',
		'process_id' => 'int',
		'group_id' => 'int',
		'user_id' => 'int'
	];

	public function group()
	{
		return $this->belongsTo(Group::class);
	}

	public function process_detail_state()
	{
		return $this->belongsTo(ProcessDetailState::class);
	}

	public function process_detail_type()
	{
		return $this->belongsTo(ProcessDetailType::class);
	}

	public function process()
	{
		return $this->belongsTo(Process::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function process_detail_activities()
	{
		return $this->hasMany(ProcessDetailActivity::class);
	}
}
