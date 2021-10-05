<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductGeneric
 
 * 
 * @property int $id
 * @property string $name
 * @property int $drug_concentration_id
 * @property int $measurement_units_id
 * @property int $product_presentation_id
 * @property string $description
 * @property int $pbs_type_id
 * @property int $product_subcategory_id
 * @property int $consumption_unit_id
 * @property string $administration_route_id
 * @property string $special_controller_medicene_id
 * @property string $code_atc
 * @property string $implantable_id
 * @property string $reuse_id
 * @property string $invasive_id
* @property string $consignment_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ProductGeneric extends Model
{
	protected $table = 'product_generic';

	
}
