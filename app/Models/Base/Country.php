<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Region;
use App\Models\Campus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * 
 * @property int $id
 * @property string $name
 * @property int $sga_origin_fk
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Region[] $regions
 *
 * @package App\Models\Base
 */
class Country extends Model
{
	protected $table = 'country';

	protected $casts = [
		'sga_origin_fk' => 'int'
	];

	public function regions()
	{
		return $this->hasMany(Region::class);
	}
	public function campus()
	{
		return $this->hasMany(Campus::class);
	}
}
