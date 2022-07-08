<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bed
 * 
 * @property int $id 
 * @property string $fluter
 * @property string $distal
 * @property string $widespread
 * @property string $peribucal
 * @property string $periorbitary
 * @property string $none
 * @property string $intercostal
 * @property string $aupraclavicular
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChAssSigns extends Model
{
	protected $table = 'ch_ass_signs';

	
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}