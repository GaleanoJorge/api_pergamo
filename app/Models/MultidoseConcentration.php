<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\MultidoseConcentration as BaseMultidoseConcentration;

class MultidoseConcentration extends BaseMultidoseConcentration
{
protected $fillable = [
	'name',
	];
}
