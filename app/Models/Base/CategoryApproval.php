<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoryApproval
 * 
 * @property int $id
 * @property int $category_id
 * @property string $approval_file
 * @property Carbon $approval_date
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Category $category
 *
 * @package App\Models\Base
 */
class CategoryApproval extends Model
{
	protected $table = 'category_approval';

	protected $casts = [
		'category_id' => 'int'
	];

	protected $dates = [
		'approval_date'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}
}
