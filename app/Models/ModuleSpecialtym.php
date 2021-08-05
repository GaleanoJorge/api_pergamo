<?php

namespace App\Models;

use App\Models\Base\ModuleSpecialtym as BaseModuleSpecialtym;

class ModuleSpecialtym extends BaseModuleSpecialtym
{
	protected $fillable = [
		'module_id',
		'specialtym_id'
	];
}
