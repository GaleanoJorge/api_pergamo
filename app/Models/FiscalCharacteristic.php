<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FiscalCharacteristic as BaseFiscalCharacteristic;

class FiscalCharacteristic extends BaseFiscalCharacteristic
  {
    protected $fillable = [

		'fsc_code',
    'fsc_name',
    
         
	
	];
}
