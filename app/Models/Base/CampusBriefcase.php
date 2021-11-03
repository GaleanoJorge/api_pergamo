<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\Briefcase;
use App\Models\Campus;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CampusBriefcase
 * 
 * @property int $id
 * @property int $briefcase_id
 * @property int $campus_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class CampusBriefcase extends Model
{
	protected $table = 'campus_briefcase';

	protected $casts = [
		'campus_id' => 'int',
		'briefcase_id' => 'int',
	];

	public function campus()
	{
		return $this->belongsTo(Campus::class);
	}


	
}
