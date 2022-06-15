<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\AssistanceSpecial as BaseAssistanceSpecial;

class AssistanceSpecial extends BaseAssistanceSpecial
{
    protected $fillable = [
		'specialty_id',
    'assistance_id',
	
	];
}
