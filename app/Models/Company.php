<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Company as BaseCompany;

class Company extends BaseCompany
{
    protected $fillable = [

      'identype_id',
      'code',
      'name',
      'category_id',
      'type',
      'administrator',
      'country_id',
      'city_id',
      'address',
      'phone',
      'web',
      'mail',
      'representative',
      'repre_phone',
      'repre_mail',
      'repre_identification',
      'iva',
      'retainer',
      'kindperson_id',
      'registration',
      'opportunity',
      'discount',
      'term'

	
	];
}
