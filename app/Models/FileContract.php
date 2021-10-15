<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FileContract as BaseFileContract;

class FileContract extends BaseFileContract
{
    protected $fillable = [
		'name',
		'file',
		'contract_id',
		
	];
}
