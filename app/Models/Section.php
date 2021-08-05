<?php

namespace App\Models;

use App\Models\Base\Section as BaseSection;

class Section extends BaseSection
{
	protected $fillable = [
		'name',
		'description',
		'coursebase_id',
		'answer_type_id'
	];

	public function user_role()
	{
		return $this->belongsToMany(UserRole::class, 'survey_sections')
					->withPivot('id', 'name', 'order', 'weight', 'is_percent', 'survey_id', 'course_id')
					->withTimestamps();
	}
}
