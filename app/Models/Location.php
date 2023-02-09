<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Location as BaseLocation;

class Location extends BaseLocation
{
    protected $fillable = [
        'admission_id',
        'admission_route_id',
        'scope_of_attention_id',
        'program_id',
        'pavilion_id',
        'flat_id',
        'procedure_id',
        'bed_id',
        'user_id',
	];
}
