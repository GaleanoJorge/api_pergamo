<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChNursingProcedure as BaseChNursingProcedure;

class ChNursingProcedure extends BaseChNursingProcedure
{
    protected $fillable = [
    'nursing_procedure_id',
    'observation',
    'type_record_id',
    'ch_record_id',

	];
}
