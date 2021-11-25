<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GlossModality
 * 
 * @property int $id
 * @property int $status_id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Status[] $Status
 *
 * @package App\Models\Base
 */
class GlossModality extends Model
{
	protected $table = 'gloss_modality';

	public function status()
	{
		return $this->belongsTo(Status::class);
	}
}
