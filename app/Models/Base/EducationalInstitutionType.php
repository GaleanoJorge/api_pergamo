<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\EducationalInstitution;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EducationalInstitutionType
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|EducationalInstitution[] $educational_institutions
 *
 * @package App\Models\Base
 */
class EducationalInstitutionType extends Model
{
	protected $table = 'educational_institution_type';

	public function educational_institutions()
	{
		return $this->hasMany(EducationalInstitution::class);
	}
}
