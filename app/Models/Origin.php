<?php

namespace App\Models;

use App\Models\Base\Origin as BaseOrigin;

class Origin extends BaseOrigin
{
	protected $fillable = [
		'name',
		'description'
	];

	public static function getWithValidity(){
		return BaseOrigin::select('origin.id','origin.validity_id',
		\DB::raw('CONCAT_WS(" - ",validity.name,origin.name) AS name')
		)->join('validity','origin.validity_id','validity.id')
		->get();
	}
}
