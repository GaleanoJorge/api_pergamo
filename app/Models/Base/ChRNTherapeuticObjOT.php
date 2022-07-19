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
 * @property string $check1_hold
 * @property string $check2_improve
 * @property string $check3_structure
 * @property string $check4_promote
 * @property string $check5_strengthen
 * @property string $check6_promote_2
 * @property string $check7_develop
 * @property string $check8_strengthen_2
 * @property string $check9_favor
 * @property string $check10_functionality

 * @property unsignedBigInteger type_record_id 
 * @property unsignedBigInteger ch_record_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChRNTherapeuticObjOT extends Model
{
	protected $table = 'ch_r_n_therapeutic_obj_o_t';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
