<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ProductCategory;
use App\Models\ProductDose;
use App\Models\ProductGroup;
use App\Models\ProductSubcategory;
use App\Models\SuppliesMeasure;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductSupplies
 
 * 
 * @property int $id
 * @property string $size
 * @property string $measure
 * @property string $description
 * @property string $stature
 * @property BigInteger $product_group_id
 * @property BigInteger $product_category_id
 * @property BigInteger $product_subcategory_id
 * @property string $code_gmdn
 * @property integer $minimum_stock
 * @property integer $maximum_stock
 * @property BigInteger $product_dose_id
 * @property BigInteger $size_supplies_measure_id
 * @property BigInteger $measure_supplies_measure_id
 * @property BigInteger $product_group_id
 * @property BigInteger $product_category_id
 * @property BigInteger $product_subcategory_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ProductSupplies extends Model
{
	protected $table = 'product_supplies';

	public function size_supplies_measure()
	{
		return $this->belongsTo(SuppliesMeasure::class);
	}

	public function measure_supplies_measure()
	{
		return $this->belongsTo(SuppliesMeasure::class);
	}

	public function product_dose()
	{
		return $this->belongsTo(ProductDose::class);
	}

	public function product_group()
	{
		return $this->belongsTo(ProductGroup::class);
	}

	public function product_category()
	{
		return $this->belongsTo(ProductCategory::class);
	}

	public function product_subcategory()
	{
		return $this->belongsTo(ProductSubcategory::class);
	}
}
