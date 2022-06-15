<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;



use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * Class InterventionTl
 * 
 * @property int $id
 * @property string $text
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id

 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class InterventionTl extends Model
{
	protected $table = 'intervention_tl';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}

}
