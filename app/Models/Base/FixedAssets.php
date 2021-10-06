<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FixedAssets
 
 * 
 * @property int $id
 * @property string $name
 * @property int $product_subcategory_id
 * @property int $product_presentation_id
 * @property int $consumption_unit_id
 * @property int $factory_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class FixedAssets extends Model
{
	protected $table = 'fixed_assets';

	
}
