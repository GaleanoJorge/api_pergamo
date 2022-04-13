<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChRstMammographyGyneco as BaseChRstMammographyGyneco;

class ChRstMammographyGyneco extends BaseChRstMammographyGyneco
{
  protected $fillable = [
    'name',
  ];
}
