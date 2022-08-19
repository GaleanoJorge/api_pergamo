<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SwallowingDisordersTL
 * 
 * @property int $id
 * @property string $solid_dysphagia
 * @property string $clear_liquid_dysphagia
 * @property string $thick_liquid_dysphagia
 * @property string $nasogastric_tube
 * @property string $gastrostomy
 * @property string $nothing_orally observations
 * @property string $observations
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class SwallowingDisordersTL extends Model
{
	protected $table = 'swallowing_disorders_tl';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
