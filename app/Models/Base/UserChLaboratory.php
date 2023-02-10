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
 * @property int $user_id
 * @property int $ch_laboratory_id
 * @property int $laboratory_status_id
 * @property string $observation
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class UserChLaboratory extends Model
{
	protected $table = 'user_ch_laboratory';

	public function ch_laboratory()
	{
		return $this->belongsTo(ChLaboratory::class);
	}
	public function laboratory_status()
	{
		return $this->belongsTo(LaboratoryStatus::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
