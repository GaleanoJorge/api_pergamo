<?php

namespace App\Models;

use App\Models\Base\BaseItem;

class Item extends BaseItem
{
	protected $fillable = [
		'item_parent_id',
		'name',
		'route',
		'icon'
	];
}
