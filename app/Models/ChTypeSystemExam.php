<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChTypeSystemExam as BaseChTypeSystemExam;

class ChTypeSystemExam extends BaseChTypeSystemExam
{
  protected $fillable = [
    'name'
  ];
}
