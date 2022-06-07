<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Region;
use App\Models\Municipality;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Campus
 * 
 * @property int $id
 * @property string $name
 * @property bigInteger $region_id
 * @property bigInteger $municipality_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Course[] $courses
 *
 * @package App\Models\Base
 */
class Campus extends Model
{
	protected $table = 'campus';

	public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
	public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }
}
