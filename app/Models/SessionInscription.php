<?php

namespace App\Models;

use App\Models\Base\SessionInscription as BaseSessionInscription;

class SessionInscription extends BaseSessionInscription
{
	protected $fillable = [
		'session_id',
		'user_role_category_inscription_id'
	];
}
