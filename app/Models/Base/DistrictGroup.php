<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\District;
use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DistrictGroup
 * 
 * @property int $id
 * @property int $group_id
 * @property int $district_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property District $district
 * @property Group $group
 *
 * @package App\Models\Base
 */
class DistrictGroup extends Model
{
	protected $table = 'district_group';

	protected $casts = [
		'group_id' => 'int',
		'district_id' => 'int'
	];

	public function district()
	{
		return $this->belongsTo(District::class);
	}

	public function group()
	{
		return $this->belongsTo(Group::class);
	}
}
