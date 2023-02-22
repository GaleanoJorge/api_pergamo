<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Company;
use Carbon\Carbon;
use App\Models\ContractStatus;
use App\Models\TypeContract;
use App\Models\TypeBriefcase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CiiuGroup
 * 
 * @property int $id
 * @property string $number_contract
 * @property string $name
 * @property int $company_id
 * @property int $type_contract_id
 * @property int $occasional
 * @property double $amount
 * @property date $start_date
 * @property date $finish_date
 * @property int $contract_status_id
 * @property int $firms_contractor_id
 * @property int $firms_contracting_id
 * @property int $regime_id
 * @property int $start_date_invoice
 * @property int $finish_date_invoice
 * @property int $expiration_days_portafolio
 * @property int $discount
 * @property int $min_attention
 * @property int $max_attention
 * @property int $discount_rate
 * @property string $observations
 * @property string $objective
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Contract extends Model
{
	protected $table = 'contract';
	
	protected $casts = [
		'contract_status_id' => 'int',
	];

	public function contract_status()
	{
		return $this->belongsTo(ContractStatus::class);
	}
	public function company()
	{
		return $this->belongsTo(Company::class, 'company_id');
	}
	public function type_contract()
	{
		return $this->belongsTo(TypeContract::class);
	}
	public function type_briefcase()
	{
		return $this->belongsTo(TypeBriefcase::class,'regime_id');
	}
	
}
