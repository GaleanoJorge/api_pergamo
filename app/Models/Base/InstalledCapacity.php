<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Installed capacity
 * 
 * @property int $id
 * @property int $user_id
 * @property date $start_date
 * @property date $finish_date
 * @property int $PAD_patient_quantity
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 

 *
 * @package App\Models\Base
 */
class InstalledCapacity extends Model
{
	protected $table = 'installed_capacity';

}
