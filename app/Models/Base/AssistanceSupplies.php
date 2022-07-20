<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChRecord;
use App\Models\PharmacyProductRequest;
use App\Models\SuppliesStatus;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 * 
 * @property int $id
 * @property int $user_incharge_id
 * @property int $pharmacy_product_request_id
 * @property int $ch_record_id
 * @property int $supplies_status_id
 * @property string $observation
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models\Base
 */
class AssistanceSupplies extends Model
{
	protected $table = 'assistance_supplies';

	public function users()
	{
		return $this->belongsTo(User::class,'user_incharge_id');
	}
	public function pharmacy_product_request()
	{
		return $this->belongsTo(PharmacyProductRequest::class);
	}

}
