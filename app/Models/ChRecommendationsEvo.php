<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChRecommendationsEvo as BaseChRecommendationsEvo;

class ChRecommendationsEvo extends BaseChRecommendationsEvo
{
  protected $fillable = [
    'recommendations_evo_id',
    'type_record_id',
    'ch_record_id',
  ];
}
