<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\Campus;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DietSuppliesOutput
 * 
 * @property int $id
 * @property string $date
 * @property BigInteger $campus_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class DietSuppliesOutput extends Model
{
	protected $table = 'diet_supplies_output';

	public function campus()
	{
		return $this->belongsTo(Campus::class);
	}
}
