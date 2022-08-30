<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Assistance;
use App\Models\Procedure;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bank
 
 * 
 * @property int $id
 * @property string $code
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class AssistanceProcedure extends Model
{
	protected $table = 'assistance_procedure';

	protected $casts = [
		'assistance_id' => 'int',
		'procedure_id' => 'int'
	];

	public function assistance()
	{
		return $this->belongsTo(Assistance::class);
	}

	public function procedure()
	{
		return $this->belongsTo(Procedure::class);
	}
	
}
