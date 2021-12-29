<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\AdministrationRoute as BaseAdministrationRoute;

class AdministrationRoute extends BaseAdministrationRoute
{
    protected $fillable = [

    'name',
    
	];
}
