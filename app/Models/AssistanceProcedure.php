<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\AssistanceProcedure as BaseAssistanceProcedure;

class AssistanceProcedure extends BaseAssistanceProcedure
{
    protected $fillable = [
    'assistance_id',
    'procedure_id',
	];
    
}
