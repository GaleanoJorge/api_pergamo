<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Company as BaseCompany;

class Company extends BaseCompany
{
    protected $fillable = [

      'com_identype',
      'com_code',
      'com_name',
      'com_category',
      'com_type',
      'com_administrator',
      'com_country',
      'com_city',
      'com_address',
      'com_phone',
      'com_web',
      'com_mail',
      'com_representative',
      'com_repre_phone',
      'com_repre_mail',
      'com_repre_identification',
      'com_iva',
      'com_retainer',
      'com_kindperson',
      'com_registration',
      'com_opportunity',
      'com_discount',
      'com_term'

	
	];
}
