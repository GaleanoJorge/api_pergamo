<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ProductDose;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductGeneric
 
 * 
 * @property int $id
 * @property int $drug_concentration_id
 * @property int $measurement_units_id
 * @property int $product_presentation_id
 * @property string $description
 * @property string $dose
 * @property int $pbs_type_id
 * @property string $pbs_restriction
 * @property int $nom_product_id
 * @property string $administration_route_id
 * @property int $special_controller_medicene
 * @property string $code_atc
 * @property int $implantable
 * @property int $reuse
 * @property int $invasive
 * @property int $minimum_stock
 * @property int $maximum_stock
 * @property int $consignment
 * @property BigInteger $product_dose_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ProductGeneric extends Model
{
	protected $table = 'product_generic';

	public function product_dose()
	{
		return $this->belongsTo(ProductDose::class);
	}
}
