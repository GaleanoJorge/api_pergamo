<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Document as BaseDocument;

class Document extends BaseDocument
{
    protected $fillable = [
		'doc_name',
    'doc_state',
         
	
	];
}
