<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RentabilityTc
 * 
 * @property int $id 
 * @property string $cost_center
 * @property string $cc1
 * @property string $cc2
 * @property string $cc3
 * @property string $cc4
 * @property string $area1
 * @property string $area2
 * @property string $area3
 * @property string $area4
 * @property string $name_cost_center
 * @property string $bill
 * @property string $name_bill
 * @property string $value
 * @property string $month
 * @property string $year
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class RentabilityTc extends Model
{
	protected $table = 'rentability_tc';
}
