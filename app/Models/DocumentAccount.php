<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\DocumentAccount as BaseDocumentAccount;

class DocumentAccount extends BaseDocumentAccount
{
    protected $fillable = [
		'name',
    'state'
    
	
	];
}
