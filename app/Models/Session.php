<?php

namespace App\Models;

use App\Models\Base\Session as BaseSession;
use App\Models\UserRoleCategoryInscription;

class Session extends BaseSession
{
	protected $fillable = [
		'module_id',
		'name',
		'description',
		'session_date',
		'start_time',
		'closing_time'
	];

	protected $casts = [
		'session_date' => 'date:Y-m-d',
		'start_time' => 'datetime:H:i',
		'closing_time' => 'datetime:H:i',
	];

    protected $appends = ['nombre_completo'];

	public function user_role_category() {
        return $this->belongsToMany('App\Models\UserRoleCategoryInscription', 'session_inscriptions');
    }

    public function getNombreCompletoAttribute() {
        $name = '';
        forEach($this->user_role_category as $item){
           $name .= $item->user_role->user->firstname.' '.$item->user_role->user->lastname;
        }
        return $name;
    }

	// Multiple teachers for one session
	public function user_role_category_inscription()
	{
		return $this->belongsToMany(UserRoleCategoryInscription::class,'session_inscriptions');
	}
}
