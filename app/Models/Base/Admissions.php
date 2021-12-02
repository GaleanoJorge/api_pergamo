<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdmissionRoute;
use App\Models\Campus;
use App\Models\Location;
use App\Models\User;
use App\Models\Program;
use App\Models\Pavilion;
use App\Models\Flat;
use App\Models\Bed;
use App\Models\Contract;
use App\Models\ScopeOfAttention;


/**
 * Class Admissions
 * 
 * @property int $id
 * @property tinyInteger $campus_id
 * @property BigInteger $contract_id
 * @property BigInteger $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Admissions extends Model
{
	protected $table = 'admissions';

	public function campus()
	{
		return $this->belongsTo(Campus::class);
	}
	public function contract()
	{
		return $this->belongsTo(Contract::class);
	}
	public function users()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}
public function location()
{
	return $this->hasMany(Location::class);
}

	
}
