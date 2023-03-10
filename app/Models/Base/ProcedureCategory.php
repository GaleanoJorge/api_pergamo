<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\RipsType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProcedureCategory
 * 
 * @property int $id
 * @property string $name 
 * @property int $rips_type_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ProcedureCategory extends Model
{
	protected $table = 'procedure_category';

	protected $casts = [
		'rips_type_id' => 'int',
	];

	public function rips_type()
	{
		return $this->belongsTo(RipsType::class);
	}
	
}
