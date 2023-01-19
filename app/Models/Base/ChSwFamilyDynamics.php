<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Diagnosis;
use App\Models\ChBackground;
use App\Models\ChGynecologists;
use App\Models\ChRecord;
use App\Models\ChSwCommunications;
use App\Models\ChSwFamily;
use App\Models\ChTypeRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bed
 * 
 * @property int $id
 * @property BigInteger $decisions_id
 * @property BigInteger $authority_id
 * @property BigInteger $ch_sw_communications_id
 * @property BigInteger $ch_sw_expression_id
 * @property string $observations
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 * 
 *
 * @package App\Models\Base
 */
class ChSwFamilyDynamics extends Model
{
	protected $table = 'ch_sw_family_dynamics';

	public function decisions()
	{
		return $this->belongsTo(ChSwFamily::class);
	}
	public function authority()
	{
		return $this->belongsTo(ChSwFamily::class);
	}
	public function ch_sw_communications()
	{
		return $this->belongsTo(ChSwCommunications::class);
	}
	public function ch_sw_expression()
	{
		return $this->belongsTo(ChSwExpression::class);
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
