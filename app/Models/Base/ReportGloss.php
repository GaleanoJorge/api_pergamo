<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\User;
use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;

/**
 * Class Reports
 * 
 * @property int $id 
 * @property Date $initial_report
 * @property Date $final_report
 * @property BigInteger $campus_id
 * @property BigInteger $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ReportGloss extends Model
{
	protected $table = 'report_gloss';

	public function campus_id()
	{
		return $this->belongsTo(Campus::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}