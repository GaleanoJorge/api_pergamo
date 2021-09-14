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
 * @property BigInteger $cof_company
 * @property BigInteger $cof_characteristic
 * @property BigInteger $cof_clasification
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
