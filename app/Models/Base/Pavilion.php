<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\Flat;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pavilion
 * 
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $flat_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Pavilion extends Model
{
	protected $table = 'pavilion';

	public function flat()
	{
		return $this->belongsTo(Flat::class);
	}
}
