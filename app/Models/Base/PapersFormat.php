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
 * Class PapersFormat
 * 
 * @property int $id
 * @property bool $landscape
 * @property float $height
 * @property float $width
 * @property string $name
 * @property float $margin_top
 * @property float $margin_bottom
 * @property float $margin_left
 * @property float $margin_rigth
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Template[] $templates
 *
 * @package App\Models\Base
 */
class PapersFormat extends Model
{
	protected $table = 'papers_formats';

	protected $casts = [
		'landscape' => 'bool',
		'height' => 'float',
		'width' => 'float',
		'margin_top' => 'float',
		'margin_bottom' => 'float',
		'margin_left' => 'float',
		'margin_rigth' => 'float'
	];

	public function templates()
	{
		return $this->hasMany(Template::class, 'papers_formats_id');
	}
}
