<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ProcessDetail;
use App\Models\ProcessType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Process
 * 
 * @property int $id
 * @property int $process_type_id
 * @property int $user_id
 * @property string $message
 * @property string $state
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property ProcessType $process_type
 * @property User $user
 * @property Collection|ProcessDetail[] $process_details
 *
 * @package App\Models\Base
 */
class Process extends Model
{
	protected $table = 'process';

	protected $casts = [
		'process_type_id' => 'int',
		'user_id' => 'int'
	];

	public function process_type()
	{
		return $this->belongsTo(ProcessType::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function process_details()
	{
		return $this->hasMany(ProcessDetail::class);
	}
}
