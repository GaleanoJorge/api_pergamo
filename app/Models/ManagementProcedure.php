<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ManagementProcedure as BaseManagementProcedure;

class ManagementProcedure extends BaseManagementProcedure
{
    protected $fillable = [

    'management_plan_id',
    'procedure_id'
    
	];
}
