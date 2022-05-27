<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\FixedCode;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FixedClasification
 * 
 * @property int $id 
 * @property string $name
 * @property BigInteger $fixed_code_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class FixedClasification extends Model
{
	protected $table = 'fixed_clasification';

	public function fixed_code()
	{
		return $this->belongsTo(FixedCode::class);
	}
}
