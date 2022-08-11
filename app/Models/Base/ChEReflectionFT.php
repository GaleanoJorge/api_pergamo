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
 * Class ChEReflectionFT
 * 
 * @property int $id
 * @property string $bicipital
 * @property string $radial
 * @property string $triceps
 * @property string $patellar
 * @property string $aquilano
 * @property string $reflexes
 * @property string $observation

 * @property unsignedBigInteger type_record_id 
 * @property unsignedBigInteger ch_record_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChEReflectionFT extends Model
{
	protected $table = 'ch_e_reflection_f_t';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}






