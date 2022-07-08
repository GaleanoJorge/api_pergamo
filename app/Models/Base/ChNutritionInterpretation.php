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
 * @property string $observation
 * @property int $type_record_id
 * @property int $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChNutritionInterpretation extends Model
{
	protected $table = 'ch_nutrition_interpretation';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class, 'type_record_id');
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class, 'ch_record_id');
	}
}
