<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChFailed as BaseChFailed;

class ChFailed extends BaseChFailed
{
    protected $fillable = [
    'descriptions',
    'file_evidence',
    'ch_reason_id',
    'type_record_id',
    'ch_record_id',
	];
}
