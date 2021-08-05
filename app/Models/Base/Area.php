<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Area
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $sga_origin_fk
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Category[] $categories
 *
 * @package App\Models\Base
 */
class Area extends Model
{
	protected $table = 'area';

	protected $casts = [
		'sga_origin_fk' => 'int'
	];

	public function categories()
	{
		return $this->hasMany(Category::class);
	}
}
