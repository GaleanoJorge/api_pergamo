<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Status;
use App\Models\GlossAmbit;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GlossService
 * 
 * @property int $id
 * @property int $status_id
 * @property int $gloss_ambit_id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Status[] $Status
 * @property Collection|GlossAmbit[] $GlossAmbit
 *
 * @package App\Models\Base
 */
class GlossService extends Model
{
	protected $table = 'gloss_service';

	public function status()
	{
		return $this->belongsTo(Status::class);
	}
	public function gloss_ambit()
	{
		return $this->belongsTo(GlossAmbit::class);
	}
}
