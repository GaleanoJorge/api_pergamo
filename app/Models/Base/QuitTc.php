<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QuitTc
 * 

 * @property string $phone
 * @property string $status_call
 * @property string $agent
 * @property string $date_time
 * @property string $duration_seg
 * @property string $uniqueid
 * @property string $cedula_RUC
 * @property string $first_name
 * @property string $last_name
 * @property string $observations
 * @property string $fila
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class QuitTc extends Model
{
	protected $table = 'quit_tc';
}
