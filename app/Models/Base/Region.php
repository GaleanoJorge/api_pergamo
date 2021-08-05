<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Country;
use App\Models\Curriculum;
use App\Models\Municipality;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Region
 * 
 * @property int $id
 * @property int $country_id
 * @property int $code
 * @property string $name
 * @property int $sga_origin_fk
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Country $country
 * @property Collection|Curriculum[] $curricula
 * @property Collection|Municipality[] $municipalities
 *
 * @package App\Models\Base
 */
class Region extends Model
{
	protected $table = 'region';

	protected $casts = [
		'country_id' => 'int',
		'code' => 'int',
		'sga_origin_fk' => 'int'
	];

	public function country()
	{
		return $this->belongsTo(Country::class);
	}

	public function curricula()
	{
		return $this->hasMany(Curriculum::class);
	}

	public function municipalities()
	{
		return $this->hasMany(Municipality::class);
	}
}
