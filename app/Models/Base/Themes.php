<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Themes
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $status_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Status $status
 *
 * @package App\Models\Base
 */
class Themes extends Model
{
	protected $table = 'themes';

	protected $casts = [
		'status_id' => 'int',
	];

	public function status()
	{
		return $this->belongsTo(Status::class);
	}
}
