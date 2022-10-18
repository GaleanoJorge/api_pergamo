<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;
use App\Models\MaritalStatus;
use App\Models\AcademicLevel;
use App\Models\StudyLevelStatus;
use App\Models\Activities;
use App\Models\Inability;
use App\Models\SwRightsDuties;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SwEducation
 * 
 * @property int $id
 * @property unsignedBigInteger $sw_rights_duties_id 
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class SwEducation extends Model
{
	protected $table = 'sw_education';

	public function sw_rights_duties()
	{
		return $this->belongsTo(SwRightsDuties::class);
	}
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
