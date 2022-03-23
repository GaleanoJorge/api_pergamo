<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChReviewSystem as BaseChReviewSystem;

class ChReviewSystem extends BaseChReviewSystem
{
  protected $fillable = [
    'type_review_system_id',
    'revision',
    'observation',
    'type_record_id',
    'ch_record_id',
  ];
}
