<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\EducationalInstitution;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InstitutionMac
 * 
 * @property int $id
 * @property int $educational_institution_id
 * @property string $mac
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property EducationalInstitution $educational_institution
 *
 * @package App\Models\Base
 */
class InstitutionMac extends Model
{
	protected $table = 'institution_mac';

	protected $casts = [
		'educational_institution_id' => 'int'
	];

	public function educational_institution()
	{
		return $this->belongsTo(EducationalInstitution::class);
	}
}
