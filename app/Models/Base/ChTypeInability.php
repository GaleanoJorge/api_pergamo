<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChTypeInability
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChTypeInability extends Model
{
	protected $table = 'ch_type_inability';

	

}

