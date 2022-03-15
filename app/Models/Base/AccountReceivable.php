<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AccountReceivable
 * 
 * @property int $id
 * @property string $file_payment
 * @property bigInteger $user_id
 * @property bigInteger $gloss_ambit_id
 * @property bigInteger $status_bill_id
 * @property double $total_value_activities
 * @property string $observation
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class AccountReceivable extends Model
{
	protected $table = 'account_receivable';

	
}
