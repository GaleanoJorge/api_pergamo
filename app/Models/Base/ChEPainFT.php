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
 * Class ChEPainFT
 * 
 * @property int $id
 * @property string $burning
 * @property string $stinging
 * @property string $locatedi
 * @property string $oppressive
 * 
 * @property string $irradiated
 * @property string $located
 * @property string $intensity
 * @property string $exaccervating
 * @property string $decreated
 * 
 * @property unsignedBigInteger type_record_id 
 * @property unsignedBigInteger ch_record_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChEPainFT extends Model
{
	protected $table = 'ch_e_pain_f_t';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}






