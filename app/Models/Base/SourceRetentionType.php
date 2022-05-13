<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\TaxValueUnit;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
/**
 * Class SourceRetentionType
 
 * 
 * @property int $id
 * @property string $name
 * @property string $type
 * @property double $value
 * @property unsignedBigInteger $tax_value_unit_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class SourceRetentionType extends Model
{
	protected $table = 'source_retention_type';

	public function tax_value_unit()
	{
		return $this->belongsTo(TaxValueUnit::class);
	}
	
}
