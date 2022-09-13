<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\EnterallyDiet;
use App\Models\DietConsistency;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * Class ChDietsEvo
 * 
 * @property int $id
 * @property unsignedBigInteger $enterally_diet_id
 * @property string $diet_consistency
 * @property string $observation
 * @property unsignedBigInteger $type_record_id
 * @property unsignedBigInteger $ch_record_id

 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChDietsEvo extends Model
{
	protected $table = 'ch_diets_evo';

	public function enterally_diet()
	{
		return $this->belongsTo(EnterallyDiet::class);
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
