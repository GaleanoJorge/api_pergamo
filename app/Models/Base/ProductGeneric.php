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
