<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ConciliationResponse;
use App\Models\Gloss;
use App\Models\GlossConciliations as ModelsGlossConciliations;
use App\Models\TypeBriefcase;
use App\Models\User;
use Carbon\Carbon; 
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GlossResponse
 * 
 * @property int $id
 * @property int $gloss_id
 * @property date $cociliations_date
 * @property string $observations
 * @property int $accepted_value
 * @property int $value_not_accepted
 * @property string $file
 * @property BigInteger $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *  
 *
 * @package App\Models\Base
 */
class GlossConciliations extends Model
{
	protected $table = 'gloss_conciliations';

 
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function gloss()
	{
		return $this->belongsTo(Gloss::class);
	}

	public function conciliation_response()
	{
		// return $this->belongsToMany(Role::class, 'user_role')
		// ->withPivot('id', 'sga_origin_fk')
		// ->withTimestamps();
		return $this->belongsToMany(ConciliationResponse::class,'gloss_conciliations')
		->withTimestamps();
		// return $this->belongsTo(ConciliationResponse::class,'gloss_conciliations_id');
	}
	public function objetion_response()
	{
		return $this->belongsTo(ObjetionResponse::class);
	}
	// public function user()
	// {
	// 	return $this->belongsTo(User::class);
	// }
	public function objetion_code_response()
	{
		return $this->belongsTo(ObjetionCodeResponse::class);
	}
	public function regimen()
	{
		return $this->belongsTo(TypeBriefcase::class);
	}

	public function company()
	{
		return $this->belongsTo(Company::class);
	}
	public function campus()
	{
		return $this->belongsTo(Campus::class);
	}
	public function objetion_type()
	{
		return $this->belongsTo(ObjetionType::class);
	}
	public function repeated_initial()
	{
		return $this->belongsTo(RepeatedInitial::class);
	}
	public function gloss_modality()
	{
		return $this->belongsTo(GlossModality::class);
	}
	public function gloss_ambit()
	{
		return $this->belongsTo(GlossAmbit::class);
	}
	public function gloss_service()
	{
		return $this->belongsTo(GlossService::class);
	}
	public function objetion_code()
	{
		return $this->belongsTo(ObjetionCode::class);
	}
	public function assing_user()
	{
		return $this->belongsTo(User::class, 'assing_user_id', 'id');
	}
	public function received_by()
	{
		return $this->belongsTo(ReceivedBy::class);
	}
	public function gloss_status()
	{
		return $this->belongsTo(GlossStatus::class);
	}

}