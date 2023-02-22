<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use UserChLaboratory;

/**
 * Class Bed
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class LaboratoryStatus extends Model
{
	protected $table = 'laboratory_status';
	public static $ORDERED_STATUS_ID = 1;
	public static $CANCELED_STATUS_ID = 6;

	public function ch_laboratory()
	{
		return $this->hasMany(ChLaboratory::class);
	}

	public function user_ch_laboratory()
	{
		return $this->hasMany(UserChLaboratory::class);
	}
}
