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
 * Class OrofacialTl
 * 
 * @property int $id
 * @property string $right_hermiface_symmetry
 * @property string $right_hermiface_tone
 * @property string $right_hermiface_sensitivity
 * @property string $left_hermiface_symmetry
 * @property string $left_hermiface_tone
 * @property string $left_hermiface_sensitivity
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class OrofacialTl extends Model
{
	protected $table = 'orofacial_tl';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
