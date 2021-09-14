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
 * @property TinyInteger com_identype
 * @property string $com_code
 * @property string $com_name
 * @property BigInteger $com_category
 * @property BigInteger $com_type
 * @property BigInteger $com_administrator
 * @property BigInteger $com_country
 * @property BigInteger $com_city
 * @property string $com_address
 * @property string $com_phone
 * @property string $com_web
 * @property string $com_mail
 * @property string $com_representative
 * @property string $com_repre_phone
 * @property string $com_repre_mail
 * @property string $com_repre_identification
 * @property Integer $com_iva
 * @property Integer $com_retainer
 * @property BigInteger $com_kindperson
 * @property Integer $com_registration
 * @property Integer $com_opportunity
 * @property Integer $com_discount
 * @property Integer $com_term
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

