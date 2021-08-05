<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Module;
use App\Models\Specialtym;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ModuleSpecialtym
 * 
 * @property int $id
 * @property int $module_id
 * @property int $specialtym_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Module $module
 * @property Specialtym $specialtym
 *
 * @package App\Models\Base
 */
class ModuleSpecialtym extends Model
{
	protected $table = 'module_specialtym';

	protected $casts = [
		'module_id' => 'int',
		'specialtym_id' => 'int'
	];

	public function module()
	{
		return $this->belongsTo(Module::class);
	}

	public function specialtym()
	{
		return $this->belongsTo(Specialtym::class);
	}
}
