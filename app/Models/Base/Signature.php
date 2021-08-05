<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Template;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Signature
 * 
 * @property int $id
 * @property string $url
 * @property string $name
 * @property string $code
 * @property array $elements
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Template[] $templates
 *
 * @package App\Models\Base
 */
class Signature extends Model
{
	protected $table = 'signatures';

	protected $casts = [
		'elements' => 'json'
	];

	public function templates()
	{
		return $this->belongsToMany(Template::class, 'templates_has_signatures', 'signatures_id', 'templates_id')
					->withPivot('id', 'position', 'position_x', 'position_y', 'height', 'width')
					->withTimestamps();
	}
}
