<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Signature;
use App\Models\Template;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TemplatesHasSignature
 * 
 * @property int $id
 * @property string $position
 * @property int $templates_id
 * @property int $signatures_id
 * @property float $position_x
 * @property float $position_y
 * @property int $height
 * @property int $width
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Signature $signature
 * @property Template $template
 *
 * @package App\Models\Base
 */
class TemplatesHasSignature extends Model
{
	protected $table = 'templates_has_signatures';

	protected $casts = [
		'templates_id' => 'int',
		'signatures_id' => 'int',
		'position_x' => 'float',
		'position_y' => 'float',
		'height' => 'int',
		'width' => 'int'
	];

	public function signature()
	{
		return $this->belongsTo(Signature::class, 'signatures_id');
	}

	public function template()
	{
		return $this->belongsTo(Template::class, 'templates_id');
	}
}
