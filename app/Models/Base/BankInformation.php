<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BankInformation
 * 
 * @property int $id
 * @property string $bank
 * @property string $account_type
 * @property number $account_number
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class BankInformation extends Model
{
	protected $table = 'bank_information';

	
}
