<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\Briefcase;
use App\Models\ManualPrice;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ServicesBriefcase
 * 
 * @property int $id
 * @property int $briefcase_id
 * @property int $manual_price_id
 *  @property int $value
 * @property int $factor
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ServicesBriefcase extends Model
{
	protected $table = 'services_briefcase';

	protected $casts = [
		'briefcase_id' => 'int',
		'manual_price_id' => 'int',
	];

	public function briefcase()
	{
		return $this->belongsTo(Briefcase::class);
	}

	public function manual_price()
	{
		return $this->belongsTo(ManualPrice::class);
	}
}
