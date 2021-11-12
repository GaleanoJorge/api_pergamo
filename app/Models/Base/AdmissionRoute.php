<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdmissionRoute
 * 
 * @property int $id
 * @property string $name
 * @property string $scope_of_attetion_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class AdmissionRoute extends Model
{
	protected $table = 'admission_route';

	
}
