<?php

namespace App\Models;

use App\Models\Base\UserRoleCategoryInscription as BaseUserRoleCategoryInscription;

class UserRoleCategoryInscription extends BaseUserRoleCategoryInscription
{
	protected $fillable = [
		'user_role_id',
		'category_id',
		'inscription_status_id',
		'observation'
	];

	protected $casts = [
		'created_at' => 'datetime:Y-m-d H:m:s',
		'updated_at' => 'datetime:Y-m-d H:m:s'
	];

    public function user_role() {
        return $this->belongsTo('App\Models\UserRole', 'user_role_id');
    }

    public function sessions()
	{
        return $this->belongsToMany('App\Models\Session','session_inscriptions');
	}
}
