<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ProductSubcategory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NomProduct
 
 * 
 * @property int $id
 * @property string $name
 * @property BigInteger $product_subcategory_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class NomProduct extends Model
{
	protected $table = 'nom_product';

	public function product_subcategory()
	{
		return $this->belongsTo(ProductSubcategory::class);
	}
}
