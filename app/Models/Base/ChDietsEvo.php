<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\DietComponent;
use App\Models\DietConsistency;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * Class ChDietsEvo
 * 
 * @property int $id
 * @property unsignedBigInteger $diet_component_id
 * @property unsignedBigInteger $diet_consistency_id
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

	public function diet_component()
	{
		return $this->belongsTo(DietComponent::class);
	}
	public function diet_consistency()
	{
		return $this->belongsTo(DietConsistency::class);
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
