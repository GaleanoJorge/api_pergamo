<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ContractLog
 * 
 * @property int $id
 * @property string $name
 * @property date $date_log
 * @property int $contract_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ContractLog extends Model
{
	protected $table = 'contract_log';

	
}
