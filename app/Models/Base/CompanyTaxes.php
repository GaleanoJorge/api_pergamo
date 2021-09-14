<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CompanyTaxes
 * 
 * @property int $id
 * @property BigInteger $company_id
 * @property BigInteger $taxes_id
 * @property BigInteger $fiscal_clasification_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class CompanyTaxes extends Model
{
	protected $table = 'company_taxes';

	
}
