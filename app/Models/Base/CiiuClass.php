<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CiiuClass
 * 
 * @property int $id
 * @property string $cic_code
 * @property string $cic_name
 * @property bigInteger $cic_group
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class CiiuClass extends Model
{
	protected $table = 'ciiu_class';

	
}
