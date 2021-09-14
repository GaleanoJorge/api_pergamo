<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CiiuDivision
 * 
 * @property int $id
 * @property string $cid_code
 * @property string $cid_name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class CiiuDivision extends Model
{
	protected $table = 'ciiu_division';

	
}
