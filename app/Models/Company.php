<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Company as BaseCompany;

class Company extends BaseCompany
{
    protected $fillable = [

      'identification_type_id',
      'identification',
      'verification',
      'name',
      'company_category_id',
      'company_type_id',
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
      'iva_id',
      'retiner_id',
      'municipality_id',
      'company_kindperson_id',
      'registration',
      'opportunity',
      'discount',
      'payment_terms_id'

	
	];
}
