<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ServicesBriefcase
 * 
 * @property int $id
 * @property int $contract_id
 * @property int $procedure_id
 *  @property int $modality_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ServicesBriefcase extends Model
{
	protected $table = 'services_briefcase';

	
}
