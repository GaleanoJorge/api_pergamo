<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\RecommendationsEvo as BaseRecommendationsEvo;

class RecommendationsEvo extends BaseRecommendationsEvo
{
  protected $fillable = [
    'code',
    'name',
    'description',
    
  ];
}
