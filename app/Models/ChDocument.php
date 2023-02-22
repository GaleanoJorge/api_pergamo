<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChDocument as BaseChDocument;

class ChDocument extends BaseChDocument
{
    protected $fillable = [
		'name',
		'file',
		'ch_record_id',
		
	];
}
