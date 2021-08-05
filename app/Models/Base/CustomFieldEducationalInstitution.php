<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\CustomField;
use App\Models\EducationalInstitution;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomFieldEducationalInstitution
 * 
 * @property int $id
 * @property int $custom_field_id
 * @property int $educational_institution_id
 * @property string $value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property CustomField $custom_field
 * @property EducationalInstitution $educational_institution
 *
 * @package App\Models\Base
 */
class CustomFieldEducationalInstitution extends Model
{
	protected $table = 'custom_field_educational_institution';

	protected $casts = [
		'custom_field_id' => 'int',
		'educational_institution_id' => 'int'
	];

	public function custom_field()
	{
		return $this->belongsTo(CustomField::class);
	}

	public function educational_institution()
	{
		return $this->belongsTo(EducationalInstitution::class);
	}
}
