<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\AssistanceSupplies as BaseAssistanceSupplies;

class AssistanceSupplies extends BaseAssistanceSupplies
{
protected $fillable = [
	'user_incharge_id',
	'pharmacy_product_request_id',
    'ch_record_id',
    'supplies_status_id',
    'observation',
	];
}
