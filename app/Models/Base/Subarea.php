<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Category;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Subarea
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $status_id
 * @property int $sga_origin_fk
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Status $status
 * @property Collection|Category[] $categories
 *
 * @package App\Models\Base
 */
class Subarea extends Model
{
	protected $table = 'subarea';

	protected $casts = [
		'status_id' => 'int',
		'sga_origin_fk' => 'int'
	];

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function categories()
	{
		return $this->hasMany(Category::class);
	}
}
