<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Circuit;
use App\Models\Dependence;
use App\Models\District;
use App\Models\Entity;
use App\Models\Municipality;
use App\Models\Office;
use App\Models\Position;
use App\Models\Region;
use App\Models\SectionalCouncil;
use App\Models\Specialty;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Curriculum
 * 
 * @property int $id
 * @property int $municipality_id
 * @property int $circuit_id
 * @property int $district_id
 * @property int $sectional_council_id
 * @property int $region_id
 * @property int $specialty_id
 * @property int $office_id
 * @property int $dependence_id
 * @property int $entity_id
 * @property int $position_id
 * @property int $user_id
 * @property string $curriculum_pdf
 * @property int $sga_origin_fk
 * @property int $inactive
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Circuit $circuit
 * @property Dependence $dependence
 * @property District $district
 * @property Entity $entity
 * @property Municipality $municipality
 * @property Office $office
 * @property Position $position
 * @property Region $region
 * @property SectionalCouncil $sectional_council
 * @property Specialty $specialty
 * @property User $user
 *
 * @package App\Models\Base
 */
class Curriculum extends Model
{
	protected $table = 'curriculum';

	protected $casts = [
		'municipality_id' => 'int',
		'circuit_id' => 'int',
		'district_id' => 'int',
		'sectional_council_id' => 'int',
		'region_id' => 'int',
		'specialty_id' => 'int',
		'office_id' => 'int',
		'dependence_id' => 'int',
		'entity_id' => 'int',
		'position_id' => 'int',
		'user_id' => 'int',
		'sga_origin_fk' => 'int',
		'inactive' => 'int'
	];

	public function circuit()
	{
		return $this->belongsTo(Circuit::class);
	}

	public function dependence()
	{
		return $this->belongsTo(Dependence::class);
	}

	public function district()
	{
		return $this->belongsTo(District::class);
	}

	public function entity()
	{
		return $this->belongsTo(Entity::class);
	}

	public function municipality()
	{
		return $this->belongsTo(Municipality::class);
	}

	public function office()
	{
		return $this->belongsTo(Office::class);
	}

	public function position()
	{
		return $this->belongsTo(Position::class);
	}

	public function region()
	{
		return $this->belongsTo(Region::class);
	}

	public function sectional_council()
	{
		return $this->belongsTo(SectionalCouncil::class);
	}

	public function specialty()
	{
		return $this->belongsTo(Specialty::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
