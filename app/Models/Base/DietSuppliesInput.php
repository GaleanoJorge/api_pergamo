<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Campus;
use App\Models\DietSupplies;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DietSuppliesInput
 * 
 * @property int $id
 * @property double $amount
 * @property double $price
 * @property string $invoice_number
 * @property BigInteger $diet_supplies_id
 * @property BigInteger $company_id
 * @property BigInteger $campus_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class DietSuppliesInput extends Model
{
	protected $table = 'diet_supplies_input';

	
	public function diet_supplies()
	{
		return $this->belongsTo(DietSupplies::class);
	}
	public function company()
	{
		return $this->belongsTo(Company::class);
	}
	public function campus()
	{
		return $this->belongsTo(Campus::class);
	}
}
