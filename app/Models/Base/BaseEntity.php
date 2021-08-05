<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Status;
use App\Models\Entity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Entity
 * 
 * @property int $id
 * @property string $name
 * @property string $entities
 * @property int $status_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Status $status
 * @property Collection|Curriculum[] $curricula
 *
 * @package App\Models\Base
 */
class BaseEntity extends Model
{
	protected $table = 'entity';

	protected $casts = [
		'entity_parent_id' => 'int',
		'status_id' => 'int'
	];

	public function entity()
	{
		return $this->belongsTo(Entity::class, 'entity_parent_id');
	}

	public function entities()
	{
		return $this->hasMany(Entity::class, 'entity_parent_id');
	}

	public function status()
	{
		return $this->belongsTo(Status::class);
	}
}
