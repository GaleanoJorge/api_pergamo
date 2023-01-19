<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleLawton as BaseChScaleLawton;

class ChScaleLawton extends BaseChScaleLawton
{
  protected $fillable = [
    'phone_title',
    'phone_value',
    'phone_detail',
    'shopping_title',
    'shopping_value',
    'shopping_detail',
    'food_title',
    'food_value',
    'food_detail',
    'house_title',
    'house_value',
    'house_detail',
    'clothing_title',
    'clothing_value',
    'clothing_detail',
    'transport_title',
    'transport_value',
    'transport_detail',
    'medication_title',
    'medication_value',
    'medication_detail',
    'finance_title',
    'finance_value',
    'finance_detail',
    'total',
    'risk',
    'type_record_id',
    'ch_record_id',
  ];
}
