<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\NeighborhoodOrResidence as BaseNeighborhoodOrResidence;

class NeighborhoodOrResidence extends BaseNeighborhoodOrResidence
{
    protected $fillable = [
    'name',
    'municipality_id'

	];
}
