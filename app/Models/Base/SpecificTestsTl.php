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
 * Class SpecificTestsTl
 * 
 * @property int $id
 * @property string $hamilton_scale
 * @property string $boston_test
 * @property string $termal_merril
 * @property string $prolec_plon
 * @property string $ped_guss
 * @property string $vhi_grbas
 * @property string $pemo_speech
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class SpecificTestsTl extends Model
{
	protected $table = 'specific_tests_tl';
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}

}
