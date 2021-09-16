<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CompanyFiscal
 * 
 * @property int $id
 * @property BigInteger $company_id
 * @property BigInteger $characteristic_id
 * @property BigInteger $clasification_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class CompanyFiscal extends Model
{
	protected $table = 'company_fiscal';

	
}
