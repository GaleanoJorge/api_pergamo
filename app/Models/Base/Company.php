<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * 
 * @property int $id
 * @property BigInteger identification_type_id
 * @property string $identification
 * @property Integer verification
 * @property string $name
 * @property BigInteger $company_category_id
 * @property BigInteger $company_type_id
 * @property BigInteger $administrator
 * @property BigInteger $country_id
 * @property BigInteger $city_id
 * @property string $address
 * @property string $phone
 * @property string $web
 * @property string $mail
 * @property string $representative
 * @property string $repre_phone
 * @property string $repre_mail
 * @property string $repre_identification
 * @property Integer $iva_id
 * @property Integer $retiner_id
 * @property BigInteger $compamny_kindperson_id
 * @property Integer $registration
 * @property Integer $opportunity
 * @property Integer $discount
 * @property Integer $payment_terms_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
	class Company extends Model
{
	protected $table = 'company';
	
}

