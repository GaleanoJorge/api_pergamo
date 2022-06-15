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
 * @property double $protein_contributions
 * @property double $carbohydrate_contribution
 * @property double $lipid_contribution
 * @property double $amino_acid_volume
 * @property string $ce_se
 * @property double $dextrose_volume
 * @property double $lipid_volume
 * @property double $total_grams_of_protein
 * @property double $grams_of_nitrogen
 * @property double $total_carbohydrates
 * @property double $total_grams_of_lipids
 * @property double $total_amino_acid_volume
 * @property double $total_dextrose_volume
 * @property double $total_lipid_volume
 * @property double $total_calories
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChNutritionParenteral extends Model
{
	protected $table = 'ch_nutrition_parenteral';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class, 'type_record_id');
	
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class, 'ch_record_id');
	}
}
