<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Area
 * 
 * @property int $id
 * @property BigInteger $admissions_id
 * @property date $symptoms
 * @property string $authorization_pin
 * @property BigInteger $profesional_user_id
 * @property BigInteger $diagnosis_id
 * @property Carbon $reception_hour
 * @property Carbon $presentation_hour
 * @property Carbon $acceptance_hour
 * @property Carbon $offer_hour
 * @property Carbon $start_consult_hour
 * @property Carbon $finish_consult_hour
 * @property date $close_date
 * @property Carbon $close_crm_hour
 * @property BigInteger $copay_value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Category[] $categories
 *
 * @package App\Models\Base
 */
class PacMonitoring extends Model
{
	protected $table = 'pac_monitoring';

}
