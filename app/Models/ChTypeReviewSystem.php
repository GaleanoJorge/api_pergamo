<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChTypeReviewSystem as BaseChTypeReviewSystem;

class ChTypeReviewSystem extends BaseChTypeReviewSystem
{
  protected $fillable = [
    'name'
  ];
}
