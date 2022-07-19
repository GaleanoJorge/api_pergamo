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
 * Class ChEMSTestOT
 * 
 * @property int $id
 * @property string $appearance
 * @property string $consent
 * @property string $Attention
 * @property string $humor
 * @property string $language
 * @property string $sensory_perception
 * @property string $grade
 * @property string $contents
 * @property string $orientation
 * @property string $sleep
 * @property string $memory

 * @property unsignedBigInteger type_record_id 
 * @property unsignedBigInteger ch_record_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChEMSTestOT extends Model
{
	protected $table = 'ch_e_m_s_test_o_t';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
