<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CompanyCiiu
 * 
 * @property int $id
 * @property bigInteger $company_id
 * @property bigInteger $class_id
 * @property bigInteger $clasification_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */

class CompanyCiiu extends Model
{
	protected $table = 'company_ciiu';

	
}
