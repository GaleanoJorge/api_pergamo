<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Location;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use phpseclib3\Math\BigInteger;

/**
 * Class ReportCensus
 * 
 * @property int $id 
 * @property Date $initial_report
 * @property date $final_report
 * @property BigInteger $campus_id
 * @property BigInteger $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ReportCensus extends Model
{
	protected $table = 'report_census';

	public function location()
	{
		return $this->belongsTo(Location::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
}
