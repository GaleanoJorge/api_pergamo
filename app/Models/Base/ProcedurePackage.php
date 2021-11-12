<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\Procedure;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProcedurePackage
 * 
 * @property int $id
 * @property int $procedure_package_id
 * @property int $procedure_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ProcedurePackage extends Model
{
	protected $table = 'procedure_package';

	protected $casts = [
		'procedure_package_id' => 'int',
		'procedure_id' => 'int',
	];

	public function procedure()
	{
		return $this->belongsTo(Procedure::class);
	}
		
}
