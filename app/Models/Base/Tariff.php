<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AdmissionRoute;
use App\Models\Admissions;
use App\Models\Program;
use App\Models\PadRisk;
use App\Models\ScopeOfAttention;
use App\Models\Status;
use App\Models\TypeOfAttention;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tariff
 * 
 * @property int $id
 * @property double $name
 * @property integer $quantity
 * @property double $amount
 * @property boolean $has_car
 * @property boolean $extra_dose
 * @property boolean $phone_consult
 * @property TinyInteger $status_id
 * @property BigInteger $program_id
 * @property BigInteger $pad_risk_id
 * @property BigInteger $type_of_attention_id
 * @property BigInteger $admissions_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Tariff extends Model
{
	protected $table = 'tariff';


	public function pad_risk()
	{
		return $this->belongsTo(PadRisk::class);
	}
	public function program()
	{
		return $this->belongsTo(Program::class);
	}
	public function admission_route()
	{
		return $this->belongsTo(AdmissionRoute::class);
	}
	public function type_of_attention()
	{
		return $this->belongsTo(TypeOfAttention::class);
	}
	public function status()
	{
		return $this->belongsTo(Status::class);
	}
	public function admissions()
	{
		return $this->belongsTo(Admissions::class);
	}
}
