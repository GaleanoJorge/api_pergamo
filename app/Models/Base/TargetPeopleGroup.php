<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Group;
use App\Models\TargetPerson;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TargetPeopleGroup
 * 
 * @property int $id
 * @property int $group_id
 * @property int $target_people_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Group $group
 * @property TargetPerson $target_person
 *
 * @package App\Models\Base
 */
class TargetPeopleGroup extends Model
{
	protected $table = 'target_people_group';

	protected $casts = [
		'group_id' => 'int',
		'target_people_id' => 'int'
	];

	public function group()
	{
		return $this->belongsTo(Group::class);
	}

	public function target_person()
	{
		return $this->belongsTo(TargetPerson::class, 'target_people_id');
	}
}
