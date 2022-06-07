<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TaxValueUnit
 * 
 * @property int $id
 * @property int $value
 * @property int $year
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models\Base
 */
class TaxValueUnit extends Model
{
	protected $table = 'tax_value_unit';
}
