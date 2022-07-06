<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\NursingTypePhysical as BaseNursingTypePhysical;

class NursingTypePhysical extends BaseNursingTypePhysical
{
  protected $fillable = [
    'name',
    'description',
  ];
}
