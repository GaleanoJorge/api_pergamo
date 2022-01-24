<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\Procedure;
use App\Models\ProductGeneric;
use App\Models\Manual;
use App\Models\PriceType;
use App\Models\ProcedureType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ManualPrice
 * 
 * @property int $id
 * @property string $name
 * @property string $own_code
 * @property BigInteger $manual_id
 * @property BigInteger $procedure_id
 * @property BigInteger $price_type_id
 * @property int $manual_procedure_type_id
 * @property string homologous_id
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
		
		'manual_id' => 'int',
		'procedure_id' => 'int',
		'product_id' => 'int',
		'price_type_id' => 'int',
		'manual_procedure_type_id' => 'int',
		'homologous_id' => 'string',
	];

	public function procedure()
	{
		return $this->belongsTo(Procedure::class);
	}

	public function product()
	{
		return $this->belongsTo(ProductGeneric::class);
	}

	public function price_type()
	{
		return $this->belongsTo(PriceType::class);
	}
	public function manual()
	{
		return $this->belongsTo(Manual::class);
	}
}
