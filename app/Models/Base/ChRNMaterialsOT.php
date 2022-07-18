<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class 
 * 
 * @property int $id
 * @property string $check1_cognitive
 * @property string $check2_colors
 * @property string $check3_elements
 * @property string $check4_balls
 * @property string $check5_material_paper
 * @property string $check6_material_didactic
 * @property string $check7_computer
 * @property string $check8_clay
 * @property string $check9_colbon
 * @property string $check10_pug

 * @property unsignedBigInteger type_record_id 
 * @property unsignedBigInteger ch_record_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChRNMaterialsOT extends Model
{
	protected $table = 'ch_r_n_materials_o_t';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
