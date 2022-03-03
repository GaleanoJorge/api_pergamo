<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Manual
 * 
 * @property int $id
 * @property string $name
 * @property int $year
 * * @property int $type_manual
 * @property int $status_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Manual extends Model
{
	protected $table = 'manual';

	public function status()
	{
		return $this->belongsTo(Status::class);
	}
}
