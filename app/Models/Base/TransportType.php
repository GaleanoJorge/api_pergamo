<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ConceptBase;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TransportType
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|ConceptBase[] $concept_bases
 *
 * @package App\Models\Base
 */
class TransportType extends Model
{
	protected $table = 'transport_type';

	public function concept_bases()
	{
		return $this->hasMany(ConceptBase::class);
	}
}
