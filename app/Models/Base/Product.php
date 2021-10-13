<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 
 * 
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $factory_id
 * @property int $product_generic_id
 * @property string $invima_registration
 * @property int $invima_status_id
 * @property int $sanitary_registration_id
 * @property int $storage_conditions_id
 * @property int $risk_id
 * @property string $code_cum_file
 * @property int $code_cum_consecutive
 * @property int $regulated_drug
 * @property int $high_price
 * @property int $maximum_dose
 * @property string $indications
 * @property string $contraindications
 * @property string $applications
 * @property int $minimum_stock
 * @property int $maximum_stock
 * @property int $generate_iva
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Product extends Model
{
	protected $table = 'product';

	
}