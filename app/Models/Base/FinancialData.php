<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FinancialData
 * 
 * @property int $id
 * @property bigInteger $bank_information_id
 * @property string $rut
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class FinancialData extends Model
{
	protected $table = 'financial_data';

	
}
