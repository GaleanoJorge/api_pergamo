<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Campus;
use App\Models\Company;
use App\Models\GlossAmbit;
use App\Models\GlossModality;
use App\Models\GlossService;
use App\Models\ObjetionCode;
use App\Models\ObjetionType;
use App\Models\ReceivedBy;
use App\Models\RepeatedInitial;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Gloss
 * 
 * @property int $id
 * @property BigInteger $company_id
 * @property BigInteger $campus_id
 * @property BigInteger $objetion_type_id
 * @property BigInteger $repeated_initial_id
 * @property BigInteger $gloss_modality_id
 * @property BigInteger $gloss_ambit_id
 * @property BigInteger $gloss_service_id
 * @property BigInteger $objetion_code_id
 * @property BigInteger $user_id
 * @property BigInteger $received_by_id
 * @property string $invoice_prefix
 * @property string $objetion_detail
 * @property Integer $invoice_consecutive
 * @property Integer $objeted_value
 * @property Integer $invoice_value
 * @property Date $emission_date
 * @property Date $radication_date
 * @property Date $received_date
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Gloss extends Model
{
	protected $table = 'gloss';

	public function company()
	{
		return $this->belongsTo(Company::class);
	}
	public function campus()
	{
		return $this->belongsTo(Campus::class);
	}
	public function objetion_type()
	{
		return $this->belongsTo(ObjetionType::class);
	}
	public function repeated_initial()
	{
		return $this->belongsTo(RepeatedInitial::class);
	}
	public function gloss_modality()
	{
		return $this->belongsTo(GlossModality::class);
	}
	public function gloss_ambit()
	{
		return $this->belongsTo(GlossAmbit::class);
	}
	public function gloss_service()
	{
		return $this->belongsTo(GlossService::class);
	}
	public function objetion_code()
	{
		return $this->belongsTo(ObjetionCode::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function received_by()
	{
		return $this->belongsTo(ReceivedBy::class);
	}
}
