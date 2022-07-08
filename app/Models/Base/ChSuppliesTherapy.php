<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ProductSupplies;
use App\Models\ChRecord;
use App\Models\ChTypeRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChDiagnosis
 * 
 * @property int $id
 * @property BigInteger $product_id
 * @property int $amount
 * @property string $justification
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 * 
 *
 * @package App\Models\Base
 */
class ChSuppliesTherapy extends Model
{
	protected $table = 'ch_supplies_therapy';

		public function product()
	{
		return $this->belongsTo(ProductSupplies::class);
	}
	
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
