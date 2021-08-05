<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Certificate;
use App\Models\PapersFormat;
use App\Models\Signature;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Template
 * 
 * @property int $id
 * @property string $name
 * @property string $color
 * @property string $background
 * @property string $thumbnail
 * @property int $papers_formats_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property PapersFormat $papers_format
 * @property Collection|Certificate[] $certificates
 * @property Collection|Signature[] $signatures
 *
 * @package App\Models\Base
 */
class Template extends Model
{
	protected $table = 'templates';

	protected $casts = [
		'papers_formats_id' => 'int'
	];

	public function papers_format()
	{
		return $this->belongsTo(PapersFormat::class, 'papers_formats_id');
	}

	public function certificates()
	{
		return $this->hasMany(Certificate::class, 'templates_id');
	}

	public function signatures()
	{
		return $this->belongsToMany(Signature::class, 'templates_has_signatures', 'templates_id', 'signatures_id')
					->withPivot('id', 'position', 'position_x', 'position_y', 'height', 'width')
					->withTimestamps();
	}
}
