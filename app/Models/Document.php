<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Document as BaseDocument;

class Document extends BaseDocument
{
    protected $fillable = [
		'name',
    'status_id',
         	];
}
