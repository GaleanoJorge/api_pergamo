<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Status;
use App\Models\GlossModality;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GlossAmbit
 * 
 * @property int $id
 * @property int $status_id
 * @property int $gloss_modality_id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Status[] $Status
 * @property Collection|GlossModality[] $GlossModality
 *
 * @package App\Models\Base
 */
class GlossAmbit extends Model
{
	protected $table = 'gloss_ambit';

	public function status()
	{
		return $this->hasMany(Status::class);
	}
	public function gloss_modality()
	{
		return $this->hasMany(GlossModality::class);
	}
}
