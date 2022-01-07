<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\User;
use Carbon\Carbon; 
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GlossResponse
 * 
 * @property int $id
 * @property int $gloss_id
 * @property date $cociliations_date
 * @property string $observations
 * @property int $accepted_value
 * @property int $value_not_accepted
 * @property string $file
 * @property BigInteger $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *  
 *
 * @package App\Models\Base
 */
class GlossConciliations extends Model
{
	protected $table = 'gloss_conciliations';

 
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
