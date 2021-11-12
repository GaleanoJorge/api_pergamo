<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\AdmissionRoute as BaseAdmissionRoute;

class AdmissionRoute extends BaseAdmissionRoute
{
    protected $fillable = [
    'name',
    'scope_of_attention_id',
    

	];
}
