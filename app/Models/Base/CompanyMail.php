<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CompanyMail
 * 
 * @property int $id
 * @property BigInteger $company_id
 * @property string $mail
 * @property SmallInteger $city_id
 * @property BigInteger $document_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class CompanyMail extends Model
{
	protected $table = 'company_mail';

	
}
