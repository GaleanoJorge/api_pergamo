<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\ServicesBriefcase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BillUserActivity
 * 
 * @property int $id
 * @property bigInteger $user_id
 * @property bigInteger $account_receivable_id
 * @property bigInteger $procedure_id
 * @property double $value_total
 * @property string $observation
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class BillUserActivity extends Model
{
	protected $table = 'bill_user_activity';

	public function procedure()
	{
		return $this->belongsTo(ServicesBriefcase::class,'procedure_id');

	}
	
}
