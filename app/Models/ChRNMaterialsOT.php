<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChRNMaterialsOT as BaseChRNMaterialsOT;

class ChRNMaterialsOT extends BaseChRNMaterialsOT
{
  protected $fillable = [
    'check1_cognitive',
    'check2_colors',
    'check3_elements',
    'check4_balls',
    'check5_material_paper',
    'check6_material_didactic',
    'check7_computer',
    'check8_clay',
    'check9_colbon',
    'check10_pug',

    'type_record_id',
    'ch_record_id',

  ];
}
