<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Factory
 * 
 * @property int $identification_type_id
 * @property string $identification
 * @property string $verification
 * @property string $name
 * @property int $status_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Factory extends Model
{
	protected $table = 'factory';

	
}
