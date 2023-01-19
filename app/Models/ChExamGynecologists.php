<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChExamGynecologists as BaseChExamGynecologists;

class ChExamGynecologists extends BaseChExamGynecologists
{
  protected $fillable = [
    'name',
  ];
}
