<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ServicesFixedStock as BaseServicesFixedStock;

class ServicesFixedStock extends BaseServicesFixedStock
{
  protected $fillable = [
    'fixed_stock_id', 
    'scope_of_attention_id',
  ];
}
