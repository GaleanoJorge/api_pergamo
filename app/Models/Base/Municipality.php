<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Circuit;
use App\Models\Concept;
use App\Models\Curriculum;
use App\Models\EducationalInstitution;
use App\Models\Event;
use App\Models\Region;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Municipality
 * 
 * @property int $id
 * @property int $region_id
 * @property int $circuit_id
 * @property string $name
 * @property int $sga_origin_fk
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Circuit $circuit
 * @property Region $region
 * @property Collection|Concept[] $concepts
 * @property Collection|Curriculum[] $curricula
 * @property Collection|EducationalInstitution[] $educational_institutions
 * @property Collection|Event[] $events
 * @property Collection|User[] $users
 *
 * @package App\Models\Base
 */
class Municipality extends Model
{
	protected $table = 'municipality';

	protected $casts = [
		'region_id' => 'int',
		'circuit_id' => 'int',
		'sga_origin_fk' => 'int'
	];

	public function circuit()
	{
		return $this->belongsTo(Circuit::class);
	}

	public function region()
	{
		return $this->belongsTo(Region::class);
	}

	public function concepts()
	{
		return $this->hasMany(Concept::class);
	}

	public function curricula()
	{
		return $this->hasMany(Curriculum::class);
	}

	public function educational_institutions()
	{
		return $this->hasMany(EducationalInstitution::class);
	}

	public function events()
	{
		return $this->hasMany(Event::class);
	}

	public function users()
	{
		return $this->hasMany(User::class, 'birthplace_municipality_id');
	}
}
