<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Contract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ContractState
 * 
 * @property int $id
 * @property string $name
 * 
 * @property Collection|Contract[] $contracts
 *
 * @package App\Models\Base
 */
class ContractState extends Model
{
	protected $table = 'contract_state';
	public $timestamps = false;

	public function contracts()
	{
		return $this->hasMany(Contract::class);
	}
}
