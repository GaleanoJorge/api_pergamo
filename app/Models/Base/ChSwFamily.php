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

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChSwFamily
 * 
 * @property int $id
 * @property string $firstname 
 * @property string $middlefirstname 
 * @property string $lastname 
 * @property string $middlelastname 
 * @property string $range_age 
 * @property int $identification 
 * @property int $phone 
 * @property string $landline 
 * @property string $email 
 * @property string $residence_address 
 * @property boolean $is_disability 
 * @property string $carer 
 * @property unsignedBigInteger $relationship_id 
 * @property unsignedTinyInteger $identification_type_id
 * @property unsignedBigInteger $marital_status_id 
 * @property unsignedTinyInteger $academic_level_id 
 * @property unsignedBigInteger $study_level_status_id 
 * @property unsignedBigInteger $activities_id 
 * @property unsignedBigInteger $inability_id 
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChSwFamily extends Model
{
	protected $table = 'ch_sw_family';

	public function relationship()
	{
		return $this->belongsTo(Relationship::class,'relationship_id');
	}
	public function identification_type()
	{
		return $this->belongsTo(IdentificationType::class);
	}
	public function marital_status()
	{
		return $this->belongsTo(MaritalStatus::class);
	}
	public function academic_level()
	{
		return $this->belongsTo(AcademicLevel::class);
	}
	public function study_level_status()
	{
		return $this->belongsTo(StudyLevelStatus::class);
	}
	public function activities()
	{
		return $this->belongsTo(Activities::class);
	}
	public function inability()
	{
		return $this->belongsTo(Inability::class);
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
