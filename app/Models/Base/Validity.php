<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Concept;
use App\Models\Origin;
use App\Models\SurveyInstance;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Validity
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Concept[] $concepts
 * @property Collection|Origin[] $origins
 * @property Collection|SurveyInstance[] $survey_instances
 *
 * @package App\Models\Base
 */
class Validity extends Model
{
	protected $table = 'validity';

	public function concepts()
	{
		return $this->hasMany(Concept::class);
	}

	public function origins()
	{
		return $this->hasMany(Origin::class);
	}

	public function survey_instances()
	{
		return $this->hasMany(SurveyInstance::class);
	}
}
