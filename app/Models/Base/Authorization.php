<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AssignedManagementPlan;
use App\Models\AssistanceSupplies;
use App\Models\Authorization as ModelsAuthorization;
use App\Models\AuthStatus;
use App\Models\FixedAdd;
use App\Models\ManagementPlan;
use App\Models\ManualPrice;
use App\Models\Procedure;
use App\Models\ProductGeneric;
use App\Models\ProductSupplies;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Authorization
 * 
 * @property int $id
 * @property int $procedure_id
 * @property int $admissions_id
 * @property int $auth_number
 * @property int $state_auth_id
 * @property int $fixed_add_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @package App\Models\Base
 */
class Authorization extends Model
{
	protected $table = 'authorization';
	
	public function services_briefcase()
	{
		return $this->belongsTo(ServicesBriefcase::class, 'services_briefcase_id', 'id');
	}
	
	public function admissions()
	{
		return $this->belongsTo(Admissions::class);
	}
	
	public function auth_status()
	{
		return $this->belongsTo(AuthStatus::class);
	}
	
	public function auth_package()
	{
		return $this->hasMany(ModelsAuthorization::class, 'id', 'auth_package_id');
	}

	public function manual_price()
	{
		return $this->belongsTo(ManualPrice::class, 'manual_price_id', 'id');
	}
	
	public function supplies_com()
	{
		return $this->belongsTo(ProductSuppliesCom::class, 'supplies_com_id', 'id');
	}

	public function product_com()
	{
		return $this->belongsTo(Product::class, 'product_com_id', 'id');
	}

	public function procedure()
	{
		return $this->belongsTo(Procedure::class, 'procedure_id', 'id');
	}

	public function applications()
	{
		return $this->belongsTo(AssistanceSupplies::class, 'application_id', 'id');
	}

	public function assigned_management_plan()
	{
		return $this->belongsTo(AssignedManagementPlan::class, 'assigned_management_plan_id', 'id');
	}

	public function fixed_add()
	{
		return $this->belongsTo(FixedAdd::class, 'fixed_add_id', 'id');
	}
}
