<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductCategory
 
 * 
 * @property int $id
 * @property string $name
 * @property int $product_group_id
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ProductCategory extends Model
{
	protected $table = 'product_category';

	
}
