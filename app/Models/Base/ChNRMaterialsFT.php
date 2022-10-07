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
 * @property string $Material_1
 * @property string $Material_2
 * @property string $Material_3
 * @property string $Material_4
 * @property string $Material_5
 * @property string $Material_6
 * @property string $Material_7
 * @property string $Material_8
 * @property string $Material_9
 * @property string $Material_10
 * @property string $Material_11
 * @property string $Material_12
 * @property string $Material_13
 * @property string $Material_14
 * @property string $Material_15
 * @property string $Material_16
 * @property string $Material_17
 * @property string $Material_18
 * @property string $Material_19
 * @property string $Material_20
 * @property string $Material_21
 * @property string $Material_22
 * @property string $Material_23
 * @property string $Material_24
 * @property string $Material_25
 * @property string $Material_26
 * @property string $Material_27
 * @property string $Material_28
 * @property string $Material_29

 * @property unsignedBigInteger type_record_id 
 * @property unsignedBigInteger ch_record_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChNRMaterialsFT extends Model
{
	protected $table = 'ch_n_r_materials_f_t';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
