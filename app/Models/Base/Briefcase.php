<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\TypeBriefcase;
use App\Models\Coverage;
use App\Models\Modality;
use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Briefcase
 * 
 * @property int $id
 * @property int $contract_id
 * @property string $name
 * @property int $type_briefcase_id
 * @property int $coverage_id
 * @property int $modality_id
 * @property int $status_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Briefcase extends Model
{
	protected $table = 'briefcase';

	protected $casts = [
		'type_briefcase_id' => 'int',
		'coverage_id' => 'int',
		'modality_id' => 'int',
		'status_id' => 'int',
	];

	public function type_briefcase()
	{
		return $this->belongsTo(TypeBriefcase::class);
	}
	public function coverage()
	{
		return $this->belongsTo(Coverage::class);
	}
	public function modality()
	{
		return $this->belongsTo(Modality::class);
	}
	public function status()
	{
		return $this->belongsTo(Status::class);
	}


	
}
