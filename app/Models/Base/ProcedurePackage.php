<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\Procedure;
use App\Models\ProductGeneric;
use App\Models\ProductSupplies;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProcedurePackage
 * 
 * @property int $id
 * @property int $value
 * @property int $procedure_package_id
 * @property int $procedure_id
 * @property int $manual_price_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ProcedurePackage extends Model
{
	protected $table = 'procedure_package';

	protected $casts = [
		'procedure_package_id' => 'int',
		'procedure_id' => 'int',
		'manual_price_id' => 'int',
	];

	public function procedure()
	{
		return $this->belongsTo(Procedure::class);
	}

	public function product()
	{	
		return $this->belongsTo(ProductGeneric::class);
	}

	public function supplies()
	{
		return $this->belongsTo(ProductSupplies::class);
	}
		
}
