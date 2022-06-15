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
 * @property string $description
 * @property boolean $is_allergic
 * @property string $allergy
 * @property string $appetite
 * @property string $intake
 * @property string $swallowing
 * @property string $diet_type
 * @property string $parenteral_nutrition
 * @property string $intake_control
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChNutritionFoodHistory extends Model
{
	protected $table = 'ch_nutrition_food_history';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class, 'type_record_id');
	
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class, 'ch_record_id');
	}
}
