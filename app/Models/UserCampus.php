<?php

namespace App\Models;

use App\Models\Base\UserCampus as BaseUserCampus;

class UserCampus extends BaseUserCampus
{
	protected $fillable = [
		'user_id',
		'campus_id'
	];

	public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
	public function campus()
    {
        return $this->belongsTo(Campus::class, 'campus_id');
    }
}
