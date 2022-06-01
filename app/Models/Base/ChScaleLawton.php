<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bed
 * 
 * @property int $id 
 * @property string $phone_title
 * @property int $phone_value
 * @property string $phone_detail
 * @property string $shopping_title
 * @property int $shopping_value
 * @property string $shopping_detail
 * @property string $food_title 	
 * @property int $food_value 	
 * @property string $food_detail
 * @property string $house_title
 * @property int $house_value
 * @property string $house_detail 	
 * @property string $clothing_title 	
 * @property int $clothing_value
 * @property string $clothing_detail
 * @property string $transport_title
 * @property int $transport_value 	
 * @property string $transport_detail 	
 * @property string $medication_title
 * @property int $medication_value 	
 * @property string $medication_detail 	
 * @property string $finance_title
 * @property int $finance_value 	
 * @property string $finance_detail 	
 * @property int $total 	
 * @property string $risk 	
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChScaleLawton extends Model
{
	protected $table = 'ch_scale_lawton';
	
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
