<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Concept;
use App\Models\ConceptType;
use App\Models\TransportType;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ConceptBase
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $unit_id
 * @property int $concept_type_id
 * @property int $transport_type_id
 * @property string $origin
 * @property string $destination
 * @property string $back
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property ConceptType $concept_type
 * @property TransportType $transport_type
 * @property Unit $unit
 * @property Collection|Concept[] $concepts
 *
 * @package App\Models\Base
 */
class ConceptBase extends Model
{
	protected $table = 'concept_base';

	protected $casts = [
		'unit_id' => 'int',
		'concept_type_id' => 'int',
		'transport_type_id' => 'int'
	];

	public function concept_type()
	{
		return $this->belongsTo(ConceptType::class);
	}

	public function transport_type()
	{
		return $this->belongsTo(TransportType::class);
	}

	public function unit()
	{
		return $this->belongsTo(Unit::class);
	}

	public function concepts()
	{
		return $this->hasMany(Concept::class);
	}
}
