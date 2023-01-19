<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AccountType;
use App\Models\Bank;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FinancialData
 * 
 * @property int $id
 * @property bigInteger $user_id
 * @property bigInteger $bank_id
 * @property bigInteger $account_type_id
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

	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function bank()
	{
		return $this->belongsTo(Bank::class);
	}
	public function account_type()
	{
		return $this->belongsTo(AccountType::class);
	}
}
