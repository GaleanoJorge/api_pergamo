<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ConceptBase;
use App\Models\Goal;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Unit
 * 
 * @property int $id
 * @property string $name
 * @property string $symbol
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|ConceptBase[] $concept_bases
 * @property Collection|Goal[] $goals
 *
 * @package App\Models\Base
 */
class Unit extends Model
{
	protected $table = 'unit';

	public function concept_bases()
	{
		return $this->hasMany(ConceptBase::class);
	}

	public function goals()
	{
		return $this->hasMany(Goal::class);
	}
}
