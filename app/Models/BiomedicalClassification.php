<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BiomedicalClassification as BaseBiomedicalClassification;

class BiomedicalClassification extends BaseBiomedicalClassification
{
	protected $fillable = [
		'name',
	];
}
