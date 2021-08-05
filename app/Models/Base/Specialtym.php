<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Module;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Specialtym
 * 
 * @property int $id
 * @property string $name
 * @property int $status_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Status $status
 * @property Collection|Module[] $modules
 *
 * @package App\Models\Base
 */
class Specialtym extends Model
{
	protected $table = 'specialtym';

	protected $casts = [
		'status_id' => 'int'
	];

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function modules()
	{
		return $this->hasMany(Module::class);
	}
}
