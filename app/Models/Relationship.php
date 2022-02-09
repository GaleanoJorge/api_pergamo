<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Relationship as BaseRelationship;

class Relationship extends BaseRelationship
{
    protected $fillable = [
    'name',
	];
}
