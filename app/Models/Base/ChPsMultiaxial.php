<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChTypeRecord;
use App\Models\ChRecord;
use App\Models\DiagnosisDms;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChPsMultiaxial
 * 
 * @property int $id
 * @property BigInteger $axis_one_id 
 * @property BigInteger $axis_two_id 
 * @property BigInteger $axis_three_id 
 * @property BigInteger $axis_four_id 
 * @property int $eeag 
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChPsMultiaxial extends Model
{
	protected $table = 'ch_ps_multiaxial';
	
	public function axis_one()
	{
		return $this->belongsTo(DiagnosisDms::class, 'axis_one_id');
	}
	public function axis_two()
	{
		return $this->belongsTo(DiagnosisDms::class, 'axis_two_id');
	}
	public function axis_three()
	{
		return $this->belongsTo(DiagnosisDms::class, 'axis_three_id');
	}
	public function axis_four()
	{
		return $this->belongsTo(DiagnosisDms::class, 'axis_four_id');
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
