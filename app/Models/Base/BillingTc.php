<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BillingTc
 * 
 * @property int $id 
 * @property string $consecutive
 * @property string $date
 * @property string $made_by
 * @property integer $value
 * @property string $entity
 * @property string $branch_office
 * @property string $procedures
 * @property string $doctor
 * @property string $details
 * @property string $period
 * @property string $consecutive2
 * @property string $ambit
 * @property string $campus
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class BillingTc extends Model
{
	protected $table = 'billing_tc';
}
