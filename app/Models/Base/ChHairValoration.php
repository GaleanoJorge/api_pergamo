<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\PatientPosition;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdministrationRoute
 
 * 
 * @property int $id
 * @property string $hair_revision
 * @property string $observation
 * @property int $type_record_id
 * @property int $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChHairValoration extends Model
{
	protected $table = 'ch_hair_valoration';
	
}
