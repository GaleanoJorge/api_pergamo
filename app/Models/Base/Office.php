<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Curriculum;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Office
 * 
 * @property int $id
 * @property string $name
 * @property int $status_id
 * @property int $sga_origin_fk
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Status $status
 * @property Collection|Curriculum[] $curricula
 *
 * @package App\Models\Base
 */
class Office extends Model
{
	protected $table = 'office';

	protected $casts = [
		'status_id' => 'int',
		'sga_origin_fk' => 'int'
	];

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function curricula()
	{
		return $this->hasMany(Curriculum::class);
	}
}
