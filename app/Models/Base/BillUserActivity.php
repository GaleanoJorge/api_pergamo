<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AccountReceivable;
use App\Models\Admissions;
use App\Models\AssignedManagementPlan;
use Carbon\Carbon;
use App\Models\ServicesBriefcase;
use App\Models\Tariff;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BillUserActivity
 * 
 * @property int $id
 * @property bigInteger $user_id
 * @property bigInteger $account_receivable_id
 * @property bigInteger $assigned_management_plan_id
 * @property bigInteger $procedure_id
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
	public function tariff()
	{
		return $this->belongsTo(Tariff::class,'tariff_id');

	}
	public function assigned_management_plan()
	{
		return $this->belongsTo(AssignedManagementPlan::class,'assigned_management_plan_id');

	}
	public function account_receivable()
	{
		return $this->belongsTo(AccountReceivable::class,'account_receivable_id');

	}
	public function admissions()
	{
		return $this->belongsTo(Admissions::class,'admissions_id');

	}
	
}
