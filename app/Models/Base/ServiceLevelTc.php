<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ServiceLevelTc
 * 

 * @property string $line
 * @property string $i0_10
 * @property string $i11_20
 * @property string $i21_30
 * @property string $i31_40
 * @property string $i41_50
 * @property string $i51_60
 * @property string $older_than_60
 * @property string $total_calls_received
 * @property string $replied_20
 * @property string $service_level
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ServiceLevelTc extends Model
{
	protected $table = 'service_level_tc';
}
