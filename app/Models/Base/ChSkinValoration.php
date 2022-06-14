<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BodyRegion;
use App\Models\Diagnosis;
use App\Models\SkinStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChSkinValoration
 
 * 
 * @property int $id
 * @property int $diagnosis_id
 * @property int $body_region_id
 * @property int $skin_status_id
 * @property string $exudate
 * @property string $concentrated
 * @property string $infection_sign
 * @property string $surrounding_skin
 * @property string $observation
 * @property int $type_record_id
 * @property int $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChSkinValoration extends Model
{
	protected $table = 'ch_skin_valoration';

	public function body_region()
	{
		return $this->belongsTo(BodyRegion::class, 'body_region_id');
	}
	
	public function skin_status()
	{
		return $this->belongsTo(SkinStatus::class, 'skin_status_id');
	}

	public function diagnosis()
	{
		return $this->belongsTo(Diagnosis::class, 'diagnosis_id');
	}
	
}
