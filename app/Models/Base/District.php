<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Circuit;
use App\Models\Curriculum;
use App\Models\Group;
use App\Models\SectionalCouncil;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class District
 * 
 * @property int $id
 * @property string $name
 * @property int $sectional_council_id
 * @property int $status_id
 * @property int $sga_origin_fk
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property SectionalCouncil $sectional_council
 * @property Status $status
 * @property Collection|Circuit[] $circuits
 * @property Collection|Curriculum[] $curricula
 * @property Collection|Group[] $groups
 *
 * @package App\Models\Base
 */
class District extends Model
{
	protected $table = 'district';

	protected $casts = [
		'sectional_council_id' => 'int',
		'status_id' => 'int',
		'sga_origin_fk' => 'int'
	];

	public function sectional_council()
	{
		return $this->belongsTo(SectionalCouncil::class);
	}

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function circuits()
	{
		return $this->hasMany(Circuit::class);
	}

	public function curricula()
	{
		return $this->hasMany(Curriculum::class);
	}

	public function groups()
	{
		return $this->belongsToMany(Group::class)
					->withPivot('id')
					->withTimestamps();
	}
}
