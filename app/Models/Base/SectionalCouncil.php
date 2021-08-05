<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Curriculum;
use App\Models\District;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SectionalCouncil
 * 
 * @property int $id
 * @property int $status_id
 * @property string $name
 * @property int $sga_origin_fk
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Status $status
 * @property Collection|Curriculum[] $curricula
 * @property Collection|District[] $districts
 *
 * @package App\Models\Base
 */
class SectionalCouncil extends Model
{
	protected $table = 'sectional_council';

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

	public function districts()
	{
		return $this->hasMany(District::class);
	}
}
