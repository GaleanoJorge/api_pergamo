<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\TargetPeopleGroup;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TargetPerson
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|TargetPeopleGroup[] $target_people_groups
 *
 * @package App\Models\Base
 */
class TargetPerson extends Model
{
	protected $table = 'target_people';

	public function target_people_groups()
	{
		return $this->hasMany(TargetPeopleGroup::class, 'target_people_id');
	}
}
