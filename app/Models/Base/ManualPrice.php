<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\Procedure;
use App\Models\PriceType;
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
 * @property Procedure $procedure
 * @property PriceType $price_type
 *
 * @package App\Models\Base
 */
class ManualPrice extends Model
{
	protected $table = 'manual_price';

	protected $casts = [
		'procedure_id' => 'int',
		'price_type_id' => 'int',
	];

	public function procedure()
	{
		return $this->belongsTo(Procedure::class);
	}

	public function price_type()
	{
		return $this->belongsTo(PriceType::class);
	}

	
}
