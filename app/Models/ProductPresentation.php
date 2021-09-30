<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ProductPresentation as BaseProductPresentation;

class ProductPresentation extends BaseProductPresentation
{
protected $fillable = [

	'name',
	
       
	];
}
