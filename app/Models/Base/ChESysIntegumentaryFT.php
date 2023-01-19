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
 * Class ChESysIntegumentaryFT
 * 
 * @property int $id
 * @property string $colaboration
 * @property string $integrity
 * @property string $texture
 * @property string $sweating
 * @property string $elasticity
 * @property string $extensibility
 * @property string $mobility
 * @property string $scar
 * @property string $bedsores
 * @property string $location
 * 
 * @property unsignedBigInteger type_record_id 
 * @property unsignedBigInteger ch_record_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChESysIntegumentaryFT extends Model
{
	protected $table = 'ch_e_sys_integumentary_f_t';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}






