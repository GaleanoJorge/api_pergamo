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
 * @property BigInteger $cma_company
 * @property string $cma_mail
 * @property SmallInteger $cma_city
 * @property BigInteger $cma_document
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
