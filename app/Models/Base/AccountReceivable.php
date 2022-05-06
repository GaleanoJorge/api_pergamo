<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\User;
use App\Models\GlossAmbit;
use App\Models\StatusBill;
use App\Models\Campus;
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
 * @property bigInteger $campus_id
 * @property bigInteger $minimum_salary_id
 * @property double $gross_value_activities
 * @property double $net_value_activities
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
	public function status_bill()
    {
        return $this->belongsTo(StatusBill::class);
    }
	public function minimum_salary()
    {
        return $this->belongsTo(MinimumSalary::class);
    }
}

