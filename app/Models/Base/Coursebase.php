<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Category;
use App\Models\Course;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Coursebase
 * 
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $description
 * @property string $url_img_int
 * @property string $url_img_ext
 * @property string $addressed_to
 * @property int $duration
 * @property string $contact_email
 * @property string $circular
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Category $category
 * @property Collection|Course[] $courses
 * @property Collection|Section[] $sections
 *
 * @package App\Models\Base
 */
class Coursebase extends Model
{
	protected $table = 'coursebase';

	protected $casts = [
		'category_id' => 'int',
		'duration' => 'int'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function courses()
	{
		return $this->hasMany(Course::class);
	}

	public function sections()
	{
		return $this->hasMany(Section::class);
	}
}
