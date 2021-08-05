<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Survey;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SurveyType
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Survey[] $surveys
 *
 * @package App\Models\Base
 */
class SurveyType extends Model
{
	protected $table = 'survey_type';

	public function surveys()
	{
		return $this->hasMany(Survey::class);
	}
}
