<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Company;
use App\Models\User;
use Carbon\Carbon;
use Carbon\Traits\Date;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use phpseclib3\Math\BigInteger;

/**
 * Class ReportRips
 * 
 * @property int $id 
 * @property Date $initial_report
 * @property date $final_report
 * @property BigInteger $company_id
 * @property BigInteger $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ReportRips extends Model
{
	protected $table = 'report_rips';

	public function company()
	{
		return $this->belongsTo(Company::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
}
