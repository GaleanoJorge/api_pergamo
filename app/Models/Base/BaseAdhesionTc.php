<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseAdhesionTc
 * 

 * @property string $agent
 * @property string $name
 * @property string $date_init
 * @property string $date_end
 * @property string $total_login
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class BaseAdhesionTc extends Model
{
	protected $table = 'base_adhesion_tc';
}
