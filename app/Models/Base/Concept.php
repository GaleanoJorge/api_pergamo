<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ConceptBase;
use App\Models\Event;
use App\Models\Municipality;
use App\Models\Validity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Concept
 * 
 * @property int $id
 * @property int $concept_base_id
 * @property int $validity_id
 * @property int $municipality_id
 * @property float $unit_value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property ConceptBase $concept_base
 * @property Municipality $municipality
 * @property Validity $validity
 * @property Collection|Event[] $events
 *
 * @package App\Models\Base
 */
class Concept extends Model
{
	protected $table = 'concept';

	protected $casts = [
		'concept_base_id' => 'int',
		'validity_id' => 'int',
		'municipality_id' => 'int',
		'unit_value' => 'float'
	];

	public function concept_base()
	{
		return $this->belongsTo(ConceptBase::class);
	}

	public function municipality()
	{
		return $this->belongsTo(Municipality::class);
	}

	public function validity()
	{
		return $this->belongsTo(Validity::class);
	}

	public function events()
	{
		return $this->belongsToMany(Event::class, 'event_concept')
					->withPivot('id', 'event_day_id', 'planned_quantity', 'planned_unit_value', 'real_date', 'real_quantity', 'real_unit_value', 'ticket_code', 'evidence_path', 'observations')
					->withTimestamps();
	}
}
