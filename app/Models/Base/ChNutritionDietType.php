<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChNutritionFoodHistory;
use App\Models\ChRecord;
use App\Models\ChTypeRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdministrationRoute
 
 * 
 * @property int $id
 * @property string $name
 * @property int $ch_nutrition_food_history_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChNutritionDietType extends Model
{
	protected $table = 'ch_nutrition_diet_type';

	public function ch_nutrition_food_history()
	{
		return $this->belongsTo(ChNutritionFoodHistory::class, 'ch_nutrition_food_history_id');
	}
}
