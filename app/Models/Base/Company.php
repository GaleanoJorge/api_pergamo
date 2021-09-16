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
 * @property TinyInteger identype_id
 * @property string $code
 * @property string $name
 * @property BigInteger $category_id
 * @property BigInteger $type
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
 * @property Integer $iva
 * @property Integer $retainer
 * @property BigInteger $kindperson_id
 * @property Integer $registration
 * @property Integer $opportunity
 * @property Integer $discount
 * @property Integer $term
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

