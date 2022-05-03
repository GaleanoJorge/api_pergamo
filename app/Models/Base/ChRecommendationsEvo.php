<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\RecommendationsEvo;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * Class ChRecommendationsEvo
 * 
 * @property int $id
 * @property BigInteger $recommendations_evo_id
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id

 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChRecommendationsEvo extends Model
{
	protected $table = 'ch_recommendations_evo';

	public function recommendations_evo()
	{
		return $this->belongsTo(RecommendationsEvo ::class);
	}
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}

}
