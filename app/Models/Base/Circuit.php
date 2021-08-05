<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Curriculum;
use App\Models\District;
use App\Models\Municipality;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Circuit
 * 
 * @property int $id
 * @property string $name
 * @property int $district_id
 * @property int $status_id
 * @property int $sga_origin_fk
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property District $district
 * @property Status $status
 * @property Collection|Curriculum[] $curricula
 * @property Collection|Municipality[] $municipalities
 *
 * @package App\Models\Base
 */
class Circuit extends Model
{
	protected $table = 'circuit';

	protected $casts = [
		'district_id' => 'int',
		'status_id' => 'int',
		'sga_origin_fk' => 'int'
	];

	public function district()
	{
		return $this->belongsTo(District::class);
	}

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function curricula()
	{
		return $this->hasMany(Curriculum::class);
	}

	public function municipalities()
	{
		return $this->hasMany(Municipality::class);
	}
}
