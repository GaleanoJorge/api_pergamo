<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ManualPrice
 * 
 * @property int $id
 * @property BigInteger $manual_id
 * @property BigInteger $procedure_id
 * @property BigInteger $price_type_id
 * @property int $value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ManualPrice extends Model
{
	protected $table = 'manual_price';

	
}
