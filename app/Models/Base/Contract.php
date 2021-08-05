<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ContractPayment;
use App\Models\ContractState;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Contract
 * 
 * @property int $id
 * @property string $code
 * @property string $modification_description
 * @property float $modification_value
 * @property Carbon $date_ini
 * @property Carbon $date_fin
 * @property int $user_id
 * @property float $allocation_resource
 * @property float $contract_value
 * @property string $object
 * @property string $observations
 * @property int $contract_state_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property ContractState $contract_state
 * @property User $user
 * @property Collection|ContractPayment[] $contract_payments
 * @property Collection|Event[] $events
 *
 * @package App\Models\Base
 */
class Contract extends Model
{
	protected $table = 'contract';

	protected $casts = [
		'modification_value' => 'float',
		'user_id' => 'int',
		'allocation_resource' => 'float',
		'contract_value' => 'float',
		'contract_state_id' => 'int'
	];

	protected $dates = [
		'date_ini',
		'date_fin'
	];

	public function contract_state()
	{
		return $this->belongsTo(ContractState::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function contract_payments()
	{
		return $this->hasMany(ContractPayment::class);
	}

	public function events()
	{
		return $this->hasMany(Event::class);
	}
}
