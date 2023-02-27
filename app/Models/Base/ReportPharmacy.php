<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\PharmacyProductRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use phpseclib3\Math\BigInteger;

/**
 * Class ReportPharmacy
 * 
 * @property int $id 
 * @property Date $initial_report
 * @property date $final_report
 * @property BigInteger $pharmacy_stock_id
 * @property BigInteger $user_id
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ReportPharmacy extends Model
{
	protected $table = 'report_pharmacy';

	public function pharmacy_stock()
	{
		return $this->belongsTo(PharmacyStock::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
}
