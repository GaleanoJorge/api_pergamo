<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChRecord;
use App\Models\ChTypeRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdministrationRoute
 
 * 
 * @property int $id
 * @property string $bowel_habit
 * @property boolean $vomit
 * @property double $amount_of_vomit
 * @property boolean $nausea
 * @property string $observations
 * @property int type_record_id
 * @property int ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChNutritionGastrointestinal extends Model
{
	protected $table = 'ch_nutrition_gastrointestinal';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class, 'type_record_id');
	
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class, 'ch_record_id');
	}
}
