<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChTypeRecord;
use App\Models\ChRecord;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bed
 * 
 * @property int $id 
 * @property int $eat
 * @property int $move
 * @property int $cleanliness
 * @property int $toilet
 * @property int $shower
 * @property int $commute
 * @property int $stairs
 * @property int $dress
 * @property int $stool
 * @property int $urine
 * @property string $classification 	
 * @property int $score 	
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChScaleBarthel extends Model
{
	protected $table = 'ch_scale_barthel';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
