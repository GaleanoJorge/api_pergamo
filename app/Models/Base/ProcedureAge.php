<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProcedureAge
 * 
 * @property int $id
 * @property string $name
 * @property int $egin
 * @property int $end 
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ProcedureAge extends Model
{
	protected $table = 'procedure_age';

	
}
