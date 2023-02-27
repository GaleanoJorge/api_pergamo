<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ScopeOfAttention
 * 
 * @property int $id
 * @property string $name
 * @property string $program_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ScopeOfAttention extends Model
{
	protected $table = 'scope_of_attention';

	public function admission_route()
	{
		return $this->belongsTo(AdmissionRoute::class);
	}
}