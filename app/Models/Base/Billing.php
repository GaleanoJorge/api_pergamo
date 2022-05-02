<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Company;
use App\Models\PharmacyStock;
use App\Models\TypeBillingEvidence;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Billing
 * 
 * @property int $id 
 * @property string $num_evidence
 * @property string $sub_total
 * @property string $vat
 * @property string $setting_value
 * @property string $invoice_value
 * @property BigInteger $company_id
 * @property BigInteger $type_billing_evidence_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Billing extends Model
{
	protected $table = 'billing';

	public function type_billing()
	{
		return $this->belongsTo(TypeBillingEvidence::class);
	}
	public function company()
	{
		return $this->belongsTo(Company::class);
	}
}
