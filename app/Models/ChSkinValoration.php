<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSkinValoration as BaseChSkinValoration;

class ChSkinValoration extends BaseChSkinValoration
{
    protected $fillable = [
    'diagnosis_id',
    'body_region_id',
    'skin_status_id',
    'exudate',
    'concentrated',
    'infection_sign',
    'surrounding_skin',
    'observation',
    'type_record_id',
    'ch_record_id',
	];
}
