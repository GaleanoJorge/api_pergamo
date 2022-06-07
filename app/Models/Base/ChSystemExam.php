<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;
use App\Models\ChTypeSystemExam;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChSystemExam
 * 
 * @property int $id
 * @property string $revision
 * @property string observation 
 * @property unsignedBigInteger type_ch_system_exam_id 
 * @property unsignedBigInteger type_record_id 
 * @property unsignedBigInteger ch_record_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChSystemExam extends Model
{
	protected $table = 'ch_system_exam';

	public function type_ch_system_exam()
	{
		return $this->belongsTo(ChTypeSystemExam::class);
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
