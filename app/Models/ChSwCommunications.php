<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwCommunications as BaseChSwCommunications;

class ChSwCommunications extends BaseChSwCommunications
{
  protected $fillable = [
    'name',
  ];
}
