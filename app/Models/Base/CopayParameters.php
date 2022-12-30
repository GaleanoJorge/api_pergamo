<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Status;
use App\Models\TypeContract;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GlossStatus
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models\Base
 */
class CopayParameters extends Model
{
	protected $table = 'copay_parameters';

	public function type_contract()
	{
		return $this->belongsTo(TypeContract::class);
	}

	public function status()
	{
		return $this->belongsTo(Status::class);
	}
}
