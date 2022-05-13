<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HumanTalentTc
 * 
 * @property int $id 
 * @property string $period
 * @property string $status
 * @property string $contract
 * @property string $nrodoc
 * @property string $typedoc
 * @property string $name
 * @property string $accrued_cost
 * @property string $employer_cost
 * @property string $provision_cost
 * @property string $total_cost
 * @property string $net
 * @property string $percent
 * @property string $campus
 * @property string $ambit_gen
 * @property string $ambit_esp
 * @property string $ambit_esp2
 * @property string $specialty
 * @property string $position
 * @property string $agreement
 * @property string $direction
 * @property string $account_type
 * @property string $nroaccount
 * @property string $bank
 * @property string $codbank
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class HumanTalentTc extends Model
{
	protected $table = 'human_talent_tc';
}
