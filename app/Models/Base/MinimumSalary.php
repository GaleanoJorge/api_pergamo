<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MinimumSalary
 * 
 * @property int $id
 * @property int $value
 * @property int $year
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models\Base
 */
class MinimumSalary extends Model
{
	protected $table = 'minimum_salary';
}
