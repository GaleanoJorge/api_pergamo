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
 * @property int $pain
 * @property int $tiredness
 * @property int $retching
 * @property int $depression
 * @property int $anxiety
 * @property int $drowsiness
 * @property int $appetite
 * @property int $welfare
 * @property int $breathing
 * @property int $sleep
 * @property string $observation
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChScaleEsas extends Model
{
	protected $table = 'ch_scale_esas';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
