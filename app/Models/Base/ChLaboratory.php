<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use UserChLaboratory;

/**
 * Class Bed
 * 
 * @property int $id
 * @property int $medical_order_id
 * @property int $laboratory_status_id
 * @property string $file
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChLaboratory extends Model
{
	protected $table = 'ch_laboratory';

	public function medical_order()
	{
		return $this->belongsTo(ChMedicalOrders::class);
	}
	public function laboratory_status()
	{
		return $this->belongsTo(LaboratoryStatus::class);
	}
	public function user_ch_laboratory()
	{
		return $this->hasMany(UserChLaboratory::class, );
	}
}
