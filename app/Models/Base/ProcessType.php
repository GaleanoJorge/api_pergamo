<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Process;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProcessType
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Process[] $processes
 *
 * @package App\Models\Base
 */
class ProcessType extends Model
{
	protected $table = 'process_type';

	public function processes()
	{
		return $this->hasMany(Process::class);
	}
}
