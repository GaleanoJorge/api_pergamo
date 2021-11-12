<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Gloss
 * 
 * @property int $id
 * @property BigInteger $objetion_type_id
 * @property BigInteger $repeated_initial_id
 * @property BigInteger $company_id
 * @property BigInteger $campus_id
 * @property BigInteger $gloss_ambit_id
 * @property BigInteger $gloss_modality_id
 * @property BigInteger $gloss_service_id
 * @property BigInteger $objetion_code_id
 * @property BigInteger $user_id
 * @property BigInteger $received_by_id
 * @property string $invoice_prefix
 * @property string $objetion_detail
 * @property Integer $invoice_consecutive
 * @property Integer $objeted_value
 * @property Integer $invoice_value
 * @property Date $emission_date
 * @property Date $radication_date
 * @property Date $received_date
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Gloss extends Model
{
	protected $table = 'gloss';
}
