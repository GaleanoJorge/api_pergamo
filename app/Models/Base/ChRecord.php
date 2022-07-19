<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;


use App\Models\Admissions;
use App\Models\AssignedManagementPlan;
use App\Models\RoleAttention;
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChRecord
 * 
 * @property int $id
 * @property string $status
 * @property date $date_attention
 * @property string $firm_file
 * @property BigInteger $admissions_id
 * @property BigInteger $user_id
 * @property BigInteger $ch_type_id
 * @property date $date_finish
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChRecord extends Model
{
	protected $table = 'ch_record';

	public function admissions()
	{
		return $this->belongsTo(Admissions::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function assigned_management_plan()
	{
		return $this->belongsTo(AssignedManagementPlan::class);
	}
	public function role_attention()
	{
		return $this->belongsTo(RoleAttention::class, 'type_of_attention_id');
	}
}
