<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChTypePhysicalExam as BaseChTypePhysicalExam;

class ChTypePhysicalExam extends BaseChTypePhysicalExam
{
  protected $fillable = [
    'name'
  ];
}
