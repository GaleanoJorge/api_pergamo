<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\TypePharmacyStock as BaseTypePharmacyStock;

class TypePharmacyStock extends BaseTypePharmacyStock
{
    protected $fillable = [
		'name',
		
	];
}
