<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\RecommendationsEvo;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * Class OstomiesTl
 * 
 * @property int $id
 * @property string $jejunostomy
 * @property string $colostomy 
 * @property string $observations
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id

 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class OstomiesTl extends Model
{
	protected $table = 'ostomies_tl';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}

}
