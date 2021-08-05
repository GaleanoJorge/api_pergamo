<?php

namespace App\Models;

use App\Models\Base\BaseCategory;

class Category extends BaseCategory
{
	protected $fillable = [
		'category_parent_id',
		'area_id',
		'subarea_id',
		'user_id',
		'name',
		'description'
	];
    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y',
    ];
}
