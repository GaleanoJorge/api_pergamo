<?php

namespace App\Models;

use App\Models\Base\BaseEntity;

class Entity extends BaseEntity
{
	protected $fillable = [
		'name',
		'entity_parent_id',
		'status_id'
	];
}
