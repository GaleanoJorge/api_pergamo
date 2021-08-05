<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Contract;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ContractPayment
 * 
 * @property int $id
 * @property int $contract_id
 * @property string $code
 * @property Carbon $date_code
 * @property string $code_technical_concept
 * @property Carbon $date_technical_concept
 * @property float $value_payment
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Contract $contract
 *
 * @package App\Models\Base
 */
class ContractPayment extends Model
{
	protected $table = 'contract_payments';

	protected $casts = [
		'contract_id' => 'int',
		'value_payment' => 'float'
	];

	protected $dates = [
		'date_code',
		'date_technical_concept'
	];

	public function contract()
	{
		return $this->belongsTo(Contract::class);
	}
}
