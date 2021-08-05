<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Course;
use App\Models\Template;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Certificate
 * 
 * @property int $id
 * @property string $name
 * @property array $elements
 * @property string $thumbnail
 * @property int $templates_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Template $template
 * @property Collection|Course[] $courses
 *
 * @package App\Models\Base
 */
class Certificate extends Model
{
	protected $table = 'certificates';

	protected $casts = [
		'elements' => 'json',
		'templates_id' => 'int'
	];

	public function template()
	{
		return $this->belongsTo(Template::class, 'templates_id');
	}

	public function courses()
	{
		return $this->hasMany(Course::class, 'certificates_id');
	}
}
