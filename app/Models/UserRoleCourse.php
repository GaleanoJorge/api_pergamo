<?php

namespace App\Models;

use App\Models\Base\UserRoleCourse as BaseUserRoleCourse;

class UserRoleCourse extends BaseUserRoleCourse
{
	protected $fillable = [
		'user_role_id',
		'inscription_status_id',
		'status_id',
	];

	protected $casts = [
		'created_at' => 'datetime:Y-m-d H:m:s',
		'updated_at' => 'datetime:Y-m-d H:m:s'
	];

	/**
	 * Relation from user_role_course_id on UserCertificate Table
	 */
	public function user_certificate()
	{
		return $this->hasMany(UserCertificate::class, 'user_role_course_id');
	}
	
}
