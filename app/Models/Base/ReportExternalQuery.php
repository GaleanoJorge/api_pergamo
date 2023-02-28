<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use phpseclib3\Math\BigInteger;

/**
 * Class ReportExternalQuery
 * 
 * @property int $id 
 * @property Date $initial_report
 * @property date $final_report
 * @property BigInteger $campus_id
 * @property BigInteger $user_id
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ReportExternalQuery extends Model
{
	protected $table = 'report_external_query';

	public function campus()
	{
		return $this->belongsTo(Campus::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
}