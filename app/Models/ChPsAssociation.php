<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsAssociation as BaseChPsAssociation;

class ChPsAssociation extends BaseChPsAssociation
{
  protected $fillable = [
    'name',
  ];
}
