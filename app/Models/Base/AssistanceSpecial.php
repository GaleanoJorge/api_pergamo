<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\Assistance;

/**
 * Class AssistanceSpecial
 * 
 * @property int $id
 * @property BigInteger $special_field_id
 * @property BigInteger $assistance_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class AssistanceSpecial extends Model
{
	protected $table = 'assistance_special';
	
	
}
