<?php

namespace App\Models;

use App\Models\Base\CategoryApproval as BaseCourseThemes;

class CategoryApproval extends BaseCourseThemes
{
	protected $fillable = [
		'category_id',
		'approval_file'
	];
}
