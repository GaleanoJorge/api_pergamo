<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChRecord;
use App\Models\ChTypeRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChTypeProcedure
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChTypeProcedure extends Model
{
	protected $table = 'ch_type_procedure';

	

}

