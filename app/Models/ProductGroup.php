<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ProductGroup as BaseProductGroup;

class ProductGroup extends BaseProductGroup
{
protected $fillable = [

	'name',
   
	];
}
