<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Days;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bank
 
 * 
 * @property int $id
 * @property string $code
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class MedicalDiaryDays extends Model
{
	protected $table = 'medical_diary_days';

	public function days()
	{
		return $this->belongsTo(Days::class);
	}
}
