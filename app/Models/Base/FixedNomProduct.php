<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\FixedClasification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FixedNomProduct
 
 * 
 * @property int $id
 * @property string $name
 * @property BigInteger $fixed_clasification_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class FixedNomProduct extends Model
{
	protected $table = 'fixed_nom_product';

	public function fixed_clasification()
	{
		return $this->belongsTo(FixedClasification::class);
	}
}
