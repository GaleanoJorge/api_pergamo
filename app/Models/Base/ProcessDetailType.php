<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ProcessDetail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProcessDetailType
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|ProcessDetail[] $process_details
 *
 * @package App\Models\Base
 */
class ProcessDetailType extends Model
{
	protected $table = 'process_detail_type';

	public function process_details()
	{
		return $this->hasMany(ProcessDetail::class);
	}
}
